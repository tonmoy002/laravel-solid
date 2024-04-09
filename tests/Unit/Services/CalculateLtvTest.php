<?php

namespace Tests\Unit\Services;

use App\Services\LtvCalculate;
use PHPUnit\Framework\TestCase;

class CalculateLtvTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_create_net_loan_and_ltv(): void
    {

        $givenPropertyValue = 1000000.0;
        $givenDepositAmount = 25000.0;
        $expectedNetLoan =  $givenPropertyValue - $givenDepositAmount;
        $expectedLtv = ($expectedNetLoan / $givenPropertyValue) * 100;

        $calculateLtvService = new LtvCalculate;

        $ltvCalculation = $calculateLtvService->calculate($givenPropertyValue, $givenDepositAmount);

        self::assertSame($givenPropertyValue, $ltvCalculation->propertyValue);
        self::assertSame($givenDepositAmount, $ltvCalculation->depositAmount);
        self::assertSame($expectedNetLoan, $ltvCalculation->netLoan);
        self::assertSame($expectedLtv, $ltvCalculation->ltv);
    }
}
