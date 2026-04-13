<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Helpers\RoleHelper;
use App\Helpers\StatusHelper;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function __construct(protected UserService $userService) {}

    public function index()
    {   
        $listUser = User::with('roles')
                    ->get()
                    ->map(function($data) {
                        $roleName = $data->getRoleNames()->first();
                        $data->role_name = $roleName;
                        $data->role = RoleHelper::badge($roleName);
                        $data->status = StatusHelper::badge($data->is_active);
                        return $data;
                    })
                    ->sortBy(function($user) {
                        return $user->role_name === 'admin' ? 1 : 2;
                    });
        $page = PageHelper::page('User Management', 'user');
        return view('user.index', compact('page', 'listUser'));
    }

    public function create()
    {
        $listRole = RoleHelper::list();

        $page = PageHelper::page('Add New User', 'user');
        return view('user.create', compact('page', 'listRole'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'role'         => 'required|in:admin,staff',
            'email'        => 'required|email|unique:users,email',
            'position'     => 'nullable|string',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $store = $this->userService->store($request);
        return $store['status'] == 'error' 
                ? back()->with($store['status'], $store['text'])->withInput()
                : redirect()->route('user.index')->with($store['status'], $store['text']);
    }

    public function edit(User $user)
    {
        $listRole = RoleHelper::list();
        $listStatus = StatusHelper::list();

        $page = PageHelper::page('Edit User', 'user');
        return view('user.edit', compact('page', 'user', 'listRole', 'listStatus'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'position'     => 'nullable|string',
            'is_active'     => 'nullable',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $update = $this->userService->update($request, $user);
        return redirect()->route('user.index')->with($update['status'], $update['text']);
    }

    public function destroy(User $user)
    {
        $delete = $this->userService->delete($user);

        return back()->with($delete['status'], $delete['text']);
    }

}