<?php

namespace App\Services;

use App\DataObjects\LtvDataObject;
use App\Models\Product;
use Illuminate\Support\Collection;
use App\Services\CreateProductQuote;

class GetProductQuotes
{
    private CreateProductQuote $createProductQuote;

    public function __construct(CreateProductQuote $createProductQuote)
    {
        $this->createProductQuote = $createProductQuote;
    }

    /**
     * @param LtvDataObject $ltvDataObject
     * @return Collection<int, ProductQuote>
     */
    public function get(LtvDataObject $ltvDataObject) : Collection
    {
        return Product::query()
            ->where('max_ltv', '>=', $ltvDataObject->ltv)
            ->orderBy('max_ltv')
            ->get()
            ->map(fn(Product $product) => $this->createProductQuote->create($product, $ltvDataObject));
    }
}
