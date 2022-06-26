<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /*test api get categories*/
    public function test_api_get_categories()
    {
        $response = $this->get('/api/getcategories');
        $response->assertStatus(200);
        $this->assertNotEmpty($response);
        $response->assertSee('Sports');
    }

    /*test if category has many relationship with products*/
    public function test_get_relationship_category_with_product(){
        $category = Category::with('products')->get();
        $category->contains('Home');
        $this->assertEquals(5,$category->count());
        $this->assertNotEmpty($category);

    }


}
