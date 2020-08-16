<?php

namespace Tests\Unit\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use \Mockery;

use App\Http\Controllers\ProductController;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    
    private $controllerService;
    private $view;
    private $response;
    private $controller;

    public function setUp():void
    {
        parent::setUp();

        $this->controllerService = Mockery::mock('App\Services\Controllers\ProductControllerService');

        $this->view = Mockery::mock('Illuminate\Contracts\View\Factory');

        $this->response = Mockery::mock('Illuminate\Routing\ResponseFactory');

        $this->controller = new ProductController($this->controllerService, $this->response, $this->view);
    }

    public function tearDown():void
    {
        parent::tearDown();
        
        Mockery::close();
    }

    /**
     *
     * @test
     */
    public function create()
    {
        $this->controllerService->shouldReceive('getDataForCreateView')
                            ->once()
                            ->andReturn(['categories' => 'categories']);

        $this->view->shouldReceive('make')
             ->once()
             ->with('products.create', ['categories' => 'categories']);

        $this->controller->create();
    }

    /**
    *
    * @test
    */
    public function store()
    {
        $createProductRequest = Mockery::mock('App\Http\Requests\Product\CreateProductRequest');
        
        $this->controllerService->shouldReceive('store')
                            ->once()
                            ->with($createProductRequest);

        $this->response->shouldReceive('json')
                        ->once()
                        ->andReturn([
                            'message' => 'Producto registrado exitosamente!'
                        ]);

        $this->controller->store($createProductRequest);
   }

    /**
    *
    * @test
    */
    public function show()
    {        
        $id = 1;

        $this->controllerService->shouldReceive('find')
                            ->once()
                            ->with($id)
                            ->andReturn('product');

        $this->view->shouldReceive('make')
                    ->once()
                    ->with('products.show',['product' => 'product']);

        $this->controller->show($id);
    }

    /**
    *
    * @test
    */
    public function edit()
    {        
        $id = 1;

        $this->controllerService->shouldReceive('getDataForEditView')
                            ->once()
                            ->with($id)
                            ->andReturn([
                                'categories' => 'categories',
                                'categories_ids_of_product' => 'categories_ids_of_product' 
                            ]);

        $this->controllerService->shouldReceive('find')
                            ->once()
                            ->with($id)
                            ->andReturn('product');

        $this->view->shouldReceive('make')
                    ->once()
                    ->with('products.edit',[
                        'categories' => 'categories',
                        'categories_ids_of_product' => 'categories_ids_of_product',
                        'product' => 'product'
                    ]);

        $this->controller->edit($id);
    }

     /**
     *
     * @test
     */
     public function update()
     {
        $id = 1;

        $updateProductRequest = Mockery::mock('App\Http\Requests\Product\UpdateProductRequest');
         
         $this->controllerService->shouldReceive('update')
                             ->once()
                             ->with($updateProductRequest, $id);

        $this->response->shouldReceive('json')
                        ->once()
                        ->andReturn([
                            'message' => 'Producto actualizado exitosamente!'
                        ]);

         $this->controller->update($updateProductRequest, $id);
    }   

     /**
     *
     * @test
     */
     public function destroy()
     {
        $id = 1;
         
         $this->controllerService->shouldReceive('destroy')
                             ->once()
                             ->with($id);

         $this->response->shouldReceive('json')
                        ->once();

        $this->controller->destroy($id);
    }

}
