<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Models\CategoryModel;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    ){}

    public function index()
    {
        $listCategory = CategoryModel::orderByDesc('id')->lazy();

        $page = PageHelper::page('Category', 'category');
        return view('category.index', compact('page', 'listCategory'));
    }

    public function create()
    {
        $page = PageHelper::page('Create Category', 'category');
        return view('category.create', compact('page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:category,name',
        ]);

        $store = $this->categoryService->store($request);

        return $store['status'] == 'error' 
                ? back()->with($store['status'], $store['text'])->withInput()
                : redirect()->route('category.index')->with($store['status'], $store['text']);
    }

    public function edit(CategoryModel $category)
    {
        $page = PageHelper::page('Edit Category', 'category');
        return view('category.edit', compact('page', 'category'));
    }

    public function update(Request $request, CategoryModel $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:category,name,' . $category->id,
        ]);

        $update = $this->categoryService->update($request, $category);

        $route = back()->with($update['status'], $update['text']);
        return $update['status'] == 'error' 
                ? $route->withInput()
                : $route;
    }

    public function destroy(CategoryModel $category)
    {
        $delete = $this->categoryService->delete($category);
        return back()->with($delete['status'], $delete['text']);
    }
}