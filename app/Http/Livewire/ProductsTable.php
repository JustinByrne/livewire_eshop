<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class ProductsTable extends Component
{
    public array $categories_filter = [];
    
    public function render()
    {
        $categories = Category::all();
        
        $products = Product::orderBy('name')
            ->when(! empty($this->categories_filter), function ($query) {
                return $query->whereHas('categories', function ($query) {
                    $query->whereIn('id', $this->categories_filter);
                });
            })
            ->get();
        
        return view('livewire.products-table', compact('products', 'categories'));
    }
}
