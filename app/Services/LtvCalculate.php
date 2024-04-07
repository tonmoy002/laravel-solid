<?php

namespace App\Services;

use App\DataObjects\LtvDataObject;

class LtvCalculate
{
    public function calculate(float $propertyValue, float $depositAmount) : LtvDataObject
    {
        $netLoan = $propertyValue - $depositAmount;
        $ltv = ($netLoan / $propertyValue) * 100;

        return new LtvDataObject(
            propertyValue : $propertyValue,
            depositAmount : $depositAmount,
            netLoan : $netLoan,
            ltv : $ltv
        );
    }
}
