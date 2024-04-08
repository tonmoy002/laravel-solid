<?php

namespace Tests\Feature;

use App\Livewire\ProductSearchForm;
use App\Livewire\ProductSearchResults;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductSearchTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_show_product_search_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeLivewire(ProductSearchForm::class);
        $response->assertSeeLivewire(ProductSearchResults::class);
    }

    public function test_featured_products(): void
    {
        $response = $this->get('/');
        $response->assertSeeText('Featured product with LTV ');
        //$response->assertDontSeeText('Normal product with LTV 60%');
    }
}
