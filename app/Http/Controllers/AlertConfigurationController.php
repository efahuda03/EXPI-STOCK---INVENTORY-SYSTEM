<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Models\AlertConfigurationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Str;

class AlertConfigurationController extends Controller
{
    public function index()
    {
        $listAlert30Days = AlertConfigurationModel::where('day_left', '30')->with('user')->orderBy('id', 'desc')->get();
        $listAlert7Days = AlertConfigurationModel::where('day_left', '7')->with('user')->orderBy('id', 'desc')->get();
        $listAlert3Days = AlertConfigurationModel::where('day_left', '3')->with('user')->orderBy('id', 'desc')->get();

        $page = PageHelper::page('Alert Configuration', 'alert_configuration');
        return view('alert_configuration.index', compact('page', 'listAlert30Days', 'listAlert7Days', 'listAlert3Days'));
    }

    public function create()
    {
        $listDayLeft = [
            ['value' => '30', 'label' => '30 Days Before Expiry'],
            ['value' => '7', 'label' => '7 Days Before Expiry'],
            ['value' => '3', 'label' => '3 Days Before Expiry'],
        ];

        $listEmail = User::select('id', 'email')->get();

        $page = PageHelper::page('Add Alert Configuration', 'alert_configuration');
        return view('alert_configuration.create', compact('page', 'listDayLeft', 'listEmail'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'day_left' => 'required|in:30,7,3',
            'user_id' => 'required|exists:users,id',
        ]);

        $exists = AlertConfigurationModel::where('user_id', $request->user_id)
                    ->where('day_left', $request->day_left)
                    ->exists();

        if ($exists) {
            return back()->with('error', 'Alert configuration for this user and day left already exists.')->withInput();
        }

        AlertConfigurationModel::create([
            'uuid' => Str::uuid(),
            'user_id' => $request->user_id,
            'day_left' => $request->day_left,
        ]);

        return redirect()->route('alert_configuration.index')->with('success', 'Alert configuration added successfully.');
    }   

    public function destroy($uuid)
    {
        $alert = AlertConfigurationModel::where('uuid', $uuid)->firstOrFail();
        $alert->delete();

        return redirect()->route('alert_configuration.index')->with('success', 'Alert configuration deleted successfully.');
    }
}
