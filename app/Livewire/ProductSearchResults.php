<?php

namespace App\Livewire;

use App\DataObjects\LtvDataObject;
use Livewire\Component;
use App\Models\Product;
use App\Services\GetProductQuotes;
use App\Services\LtvCalculate;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;

class ProductSearchResults extends Component
{
    public $propertyValue;

    public $depositAmount;

    private LtvCalculate $ltvCalculate;
    private GetProductQuotes $getProductQuotes;

    public function boot(LtvCalculate $ltvCalculate, GetProductQuotes $getProductQuotes){
        $this->ltvCalculate = $ltvCalculate;
        $this->getProductQuotes = $getProductQuotes;
    }

    #[On('searchProducts')]
    public function searchProducts($formData)
    {
        [$this->propertyValue, $this->depositAmount] = $formData;
    }

    
    public function render()
    {
        $ltvCalculation = $this->calculateLtv();
        $productQuotes = $this->getProductQuotes($ltvCalculation);

        return view('livewire.product-search-results', [
            'ltvCalculation' => $ltvCalculation,
            'productQuotes' => $productQuotes,
        ]);
    }

    private function calculateLtv(): ?LtvDataObject
    {
        if ($this->propertyValue === null || $this->depositAmount === null) {
            return null;
        }

        return $this->ltvCalculate->calculate($this->propertyValue, $this->depositAmount);
    }

    private function getProductQuotes(?LtvDataObject $ltvCalculation): Collection
    {
        if ($ltvCalculation === null) {
            return collect();
        }

        return $this->getProductQuotes->get($ltvCalculation);
    }
}
