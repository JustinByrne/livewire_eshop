<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class ProductsTable extends Component
{
    public function render()
    {
        $products = Product::all();
        $categories = Category::all();
        
        return view('livewire.products-table', compact('products', 'categories'));
    }
}
