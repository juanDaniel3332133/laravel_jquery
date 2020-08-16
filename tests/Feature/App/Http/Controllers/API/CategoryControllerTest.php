<?php

namespace Tests\Feature\App\Http\Controllers\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{    
    use RefreshDatabase;

    /**
     *
     * @test
     */
    public function get_categories()
    {
        $response = $this->get('/api/categories');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'categories'
        ]);
    }
}
