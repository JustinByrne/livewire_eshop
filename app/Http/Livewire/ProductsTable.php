<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class ProductsTable extends Component
{
    public array $categories_filter = [];
    public $pricing;
    
    public function render()
    {
        $categories = Category::withCount('products')
            ->get();
        
        $products = Product::orderBy('name')
            ->when(! empty($this->categories_filter), function ($query) {
                return $query->whereHas('categories', function ($query) {
                    $query->whereIn('id', $this->categories_filter);
                });
            })
            ->when($this->pricing, function ($query) {
                $prices = array_map(function($price) {
                    return $price * 100;
                }, explode(',', $this->pricing));
                
                return $query->whereBetween('price', $prices);
            })
            ->get();
        
        return view('livewire.products-table', compact('products', 'categories'));
    }
}
