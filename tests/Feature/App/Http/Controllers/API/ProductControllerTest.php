<?php

namespace Tests\Feature\App\Http\Controllers\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class ProductControllerTest extends TestCase
{    
    use RefreshDatabase;
    
    /**
     *
     * @test
     */
    public function get_products()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'products'
        ]);
    }
}

