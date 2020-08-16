<?php

namespace Tests\Unit\App\Models;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

use App\Models\Product;

class ProductTest extends TestCase
{
  use DatabaseMigrations;

  public function setUp():void
  {
    parent::setUp();

    $this->products = collect();

    for ($i=0; $i < 5; $i++)
    { 
      $this->products->push(factory(Product::class)->create());
    }

  }

   /**
    *  
    * @test
    *
    */
   public function the_code_for_the_generated_first_product_is_correct()
   {
	    $this->assertEquals("PRODUCTO0001", $this->products->first()->code);
   }

   /**
    *  
    * @test
    *
    */
   public function the_generated_code_when_already_exists_products_is_correct()
   {
	    $this->assertEquals("PRODUCTO0002", $this->products[1]->code);
   }
}
