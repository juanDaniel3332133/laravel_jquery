<?php

namespace Tests\Unit\App\Http\Controllers;

use Tests\TestCase;
use \Mockery;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\Controllers\CategoryController;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    
    private $controllerService;
    private $view;
    private $response;
    private $controller;

    public function setUp():void
    {
        parent::setUp();

        $this->controllerService = Mockery::mock('App\Services\Controllers\CategoryControllerService');

        $this->view = Mockery::mock('Illuminate\Contracts\View\Factory');

        $this->response = Mockery::mock('Illuminate\Routing\ResponseFactory');

        $this->controller = new CategoryController($this->controllerService, $this->view, $this->response);
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
    public function index()
    {
        $this->view->shouldReceive('make')
             ->once()
             ->with('categories.index');

        $this->controller->index();
    }

    /**
    *
    * @test
    */
    public function store()
    {
        $createCategoryRequest = Mockery::mock('App\Http\Requests\Category\CreateCategoryRequest');
        
        $this->controllerService->shouldReceive('store')
                            ->once()
                            ->with($createCategoryRequest);

        $this->response->shouldReceive('json')
                        ->once()
                        ->andReturn([
                            'message' => 'Categoria registrada exitosamente!'
                        ]);

        $this->controller->store($createCategoryRequest);
   }

    /**
    *
    * @test
    */
    public function edit()
    {        
        $id = 1;

        $this->controllerService->shouldReceive('find')
                            ->once()
                            ->with($id)
                            ->andReturn('finded_category');

        $this->view->shouldReceive('make')
                    ->once()
                    ->with('categories.edit',[
                        'category' => 'finded_category'
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

        $updateCategoryRequest = Mockery::mock('App\Http\Requests\Category\UpdateCategoryRequest');
         
         $this->controllerService->shouldReceive('update')
                             ->once()
                             ->with($updateCategoryRequest, $id);

        $this->response->shouldReceive('json')
                        ->once()
                        ->andReturn([
                            'message' => 'Categoria actualizada exitosamente!'
                        ]);

         $this->controller->update($updateCategoryRequest, $id);
    }   

     /**
     *
     * @test
     */
     public function _destroy()
     {
        $id = 1;

        $deleteCategoryRequest = Mockery::mock('App\Http\Requests\Category\DeleteCategoryRequest');
         
         $this->controllerService->shouldReceive('destroy')
                             ->once()
                             ->with($id);

         $this->response->shouldReceive('json')
                        ->once();

        $this->controller->destroy($deleteCategoryRequest, $id);
    }

}
