<?php

namespace Tests\Feature;

use App\Livewire\Components\FeaturedProducts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FeaturedProductComponentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_featured_product_render(): void
    {
        $featuredProducts = Livewire::test(FeaturedProducts::class);

        $featuredProducts->assertSeeText("Featured product with LTV");
    }
}
