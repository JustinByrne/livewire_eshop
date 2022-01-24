<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::all(['id', 'name']);
        
        return view('products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|unique:App\Models\Product,title',
            'description' => 'required|string',
            'price' => 'required|integer',
            'category_ids' => 'required|array|exists:App\Models\Category,id'
        ]);

        $product = Product::create($validated);
        $product->categories()->sync($request->input('category_ids'));

        return redirect()->route('products.index');
    }

    public function show(Product $product): View
    {
        $product->load('categories');
        
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $product->load('categories');

        $categories = Category::all(['id', 'name']);
        
        return view('products.edit', compact('produc', 'categories'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                Rule::unique('Product')->ignore($product->id),
            ],
            'description' => 'required|string',
            'price' => 'required|integer',
            'category_ids' => 'required|array|exists:App\Models\Category,id'
        ]);

        $product->update($validated);
        $product->categories()->sync($request->input('category_ids'));

        return redirect()->route('products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
