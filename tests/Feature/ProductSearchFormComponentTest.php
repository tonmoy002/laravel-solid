<?php

namespace Tests\Feature;

use App\Livewire\ProductSearchForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProductSearchFormComponentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_product_form_search_appear(): void
    {
        $productForm = Livewire::test(ProductSearchForm::class);
        $productForm->assertSeeText("Property value");
        $productForm->assertSeeText("Deposit amount");
    }
}
