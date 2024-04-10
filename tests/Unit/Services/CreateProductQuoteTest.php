<?php

namespace Tests\Unit\Services;

use App\DataObjects\LtvDataObject;
use App\DataObjects\ProductQuote;
use App\Models\Product;
use App\Services\CreateProductQuote;
use App\Services\LtvCalculate;
use PHPUnit\Framework\TestCase;

class CreateProductQuoteTest extends TestCase
{
    /**
     *
     * 
     */
    public function test_create_quote_for_a_product(): void
    {
        $givenLtvCalculate = new LtvDataObject(
            propertyValue: 100000,
            depositAmount: 25000,
            netLoan: 75000,
            ltv: 75,
        );

        $givenProduct = new Product([
            'fee' => 3.5,
            'interest_rate' => 1.75,
        ]);

        $expectedProductQuote = new ProductQuote(
            product: $givenProduct,
            feeAmount: 2625.00,
            grossLoanAmount: 77625.00,
            monthlyInterest: 113.203125,
        );

        $createProductQuote = new CreateProductQuote();
        $getQuote = $createProductQuote->create($givenProduct, $givenLtvCalculate);

        self::assertTrue($expectedProductQuote->product->is($getQuote->product), "The quote doesn't belong to the given product");
        self::assertSame($expectedProductQuote->feeAmount, $getQuote->feeAmount, "The fee amounts don't match");
        self::assertSame($expectedProductQuote->grossLoanAmount, $getQuote->grossLoanAmount, "The gross loan amounts don't match");
        self::assertSame($expectedProductQuote->monthlyInterest, $getQuote->monthlyInterest, "The monthly interests don't match");

    }

}
