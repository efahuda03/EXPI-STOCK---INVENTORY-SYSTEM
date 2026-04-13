<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ){}

    public function index()
    {
        $listProduct = ProductModel::with('category')
        ->orderByDesc('id')
        ->lazy()
        ->map(function ($product) {
            $product->image = $product->image 
                ? asset('storage/' . $product->image) 
                : asset('assets/img/no_image.png'); 
            
            return $product;
        });

        $user_role = \Illuminate\Support\Facades\Auth::user()->roles->first()->name;

        $page = PageHelper::page('Product', 'product');
        return view('product.index', compact('page', 'listProduct', 'user_role'));
    }

    public function create()
    {
        $listCategory = CategoryModel::lazy();

        $page = PageHelper::page('Create Product', 'product');
        return view('product.create', compact('page', 'listCategory'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'      => 'required|exists:category,id',
            'name'             => 'required|string|max:255',
            'brand'            => 'nullable|string|max:100',
            'description'      => 'required|string',
            'retail_price'     => 'required|numeric|min:0',
            'supplier_name'    => 'required|string|max:255',
            'supplier_contact' => 'required|string|max:50',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png|max:5120', 
        ], [
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Only JPG, JPEG, and PNG formats are allowed.',
            'image.max'   => 'The image size may not be greater than 5MB.',
        ]);

        $store = $this->productService->store($request);

        return $store['status'] == 'error' 
                ? back()->with($store['status'], $store['text'])->withInput()
                : redirect()->route('product.index')->with($store['status'], $store['text']);
    }

    public function edit(ProductModel $product)
    {
        $listCategory = CategoryModel::lazy();

        $page = PageHelper::page('Edit Product', 'product');
        return view('product.edit', compact('page', 'listCategory', 'product'));
    }

    public function update(Request $request, ProductModel $product)
    {
        $request->validate([
            'category_id'      => 'required|exists:category,id',
            'name'             => 'required|string|max:255',
            'brand'            => 'nullable|string|max:100',
            'description'      => 'required|string',
            'retail_price'     => 'required|numeric|min:0',
            'supplier_name'    => 'required|string|max:255',
            'supplier_contact' => 'required|string|max:50',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png|max:5120', 
            'is_active'        => 'boolean',
        ], [
            'image.mimes' => 'Only JPG, JPEG, and PNG formats are allowed.',
            'image.max'   => 'Image size must be under 5MB.',
        ]);

        $update = $this->productService->update($request, $product);

        $route = back()->with($update['status'], $update['text']);
        return $update['status'] == 'error' 
                ? $route->withInput()
                : $route;
    }

    public function destroy(ProductModel $product)
    {
        $delete = $this->productService->delete($product);
        return back()->with($delete['status'], $delete['text']);
    }
}
