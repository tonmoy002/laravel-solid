<?php

namespace App\Services;

use App\DataObjects\LtvDataObject;
use App\DataObjects\ProductQuote;
use App\Models\Product;

class CreateProductQuote
{
    public function create(Product $product, LtvDataObject $ltvDataObject) : ProductQuote
    {
        $feeAmount = $ltvDataObject->netLoan * $product->fee / 100;
        $grossLoanAmount = $ltvDataObject->netLoan + $feeAmount;
        $monthlyInterest = $grossLoanAmount * $product->interest_rate / 100 / 12;

        return new ProductQuote(
            product: $product,
            feeAmount: $feeAmount,
            grossLoanAmount: $grossLoanAmount,
            monthlyInterest: $monthlyInterest,
        );
    }
}
