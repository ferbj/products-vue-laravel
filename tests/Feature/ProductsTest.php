<?php

namespace Tests\Feature;

use App\Http\Controllers\ProductsController;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
class ProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /*test index products*/
    public function test_index_products()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $values = (new ProductsController)->index();
        $response->assertViewIs('home');
        $this->assertNotEmpty($values);
    }

    /*test api get products*/
    public function test_api_get_products()
    {
        $response = $this->get('/api/getproducts');
        $response->assertStatus(200);
        $this->assertNotEmpty($response);
        $response->assertSee('Office');
    }

    /*test when getting products paginate of 20*/
    public function test_get_products_paginate_20()
    {
        $response = (new ProductsController)->getProducts();
        $this->assertNotEmpty($response);
        $product = Product::with('category')->paginate(20);
        $this->assertCount(20, $product);
        $this->assertNotEmpty($product);
    }

    /*test if product have a relationship with category*/
    public function test_get_relationship_product_with_category()
    {
        $products = Product::with('category')->get();
        $products->contains('Office');
        $this->assertEquals(100, $products->count());
        $this->assertNotEmpty($products);

    }
}
