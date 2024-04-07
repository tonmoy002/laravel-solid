<?php

namespace App\Livewire;

use Livewire\Component;

class ProductSearchForm extends Component
{
    public $propertyValue;

    public $depositAmount;

    public function submit(){
        $this->dispatch('searchProducts', [$this->propertyValue, $this->depositAmount]);
    }

    public function render() {
        return view('livewire.product-search-form');
    }
}
