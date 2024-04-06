<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    public $propertyValue;

    public $depositAmount;

    public function render()
    {
        $searchProducts = $this->propertyValue && $this->depositAmount;

        if ($searchProducts) {
            $netLoan = $this->propertyValue - $this->depositAmount;
            $ltv = ($netLoan / $this->propertyValue) * 100;

            $products = Product::query()
                ->where('max_ltv', '>=', $ltv)
                ->orderBy('max_ltv')
                ->get()
                ->each(function (Product $product) use ($netLoan) {
                    $product->fee_amount = $netLoan * $product->fee / 100;
                    $product->gross_loan = $netLoan + $product->fee_amount;
                    $product->monthly_interest = $product->gross_loan * $product->interest_rate / 100 / 12;
                });
        } else {
            $netLoan = null;
            $ltv = null;

            $products = collect();
        }

        $featuredProducts = Product::query()
            ->where('featured', true)
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('livewire.product-search', [
            'searchProducts' => $searchProducts,
            'ltv' => $ltv,
            'netLoan' => $netLoan,
            'products' => $products,
            'featuredProducts' => $featuredProducts,
        ]);
    }
}
