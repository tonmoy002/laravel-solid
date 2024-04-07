<?php

namespace App\DataObjects;

class LtvDataObject
{
    public function __construct(
        public readonly float $propertyValue,
        public readonly float $depositAmount, 
        public readonly float $netLoan, 
        public readonly float $ltv, 
    )
    {
        
    }
}
