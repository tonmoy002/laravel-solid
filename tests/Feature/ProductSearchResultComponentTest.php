<?php

namespace Tests\Feature;

use App\Livewire\ProductSearchResults;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProductSearchResultComponentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_ltv_and_load_amount_show_result(): void
    {
        Livewire::test(ProductSearchResults::class)
            ->dispatch('searchProducts', ['100000', '25000'])
            ->assertSeeInOrder([
                'Max LTV', '75%', 'Product Fee', '3.5%'
            ]);
    }
}
