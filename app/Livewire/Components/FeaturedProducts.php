<?php

namespace App\Livewire\Components;
use App\Models\Product;
use Livewire\Component;

class FeaturedProducts extends Component
{
    public function render()
    {
        $featuredProducts = Product::query()
            ->where('featured', true)
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('livewire.components.featured-products', [
            'featuredProducts' => $featuredProducts,
        ]);
    }
    
}
