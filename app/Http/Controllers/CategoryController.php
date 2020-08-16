<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;

use App\Services\Controllers\CategoryControllerService;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Routing\ResponseFactory;


class CategoryController extends Controller
{
    private $categoryControllerService;
    private $view;
    private $response;

    public function __construct(
        CategoryControllerService $categoryControllerService,
        ViewFactory $view,
        ResponseFactory $response
    )
    {
        $this->categoryControllerService = $categoryControllerService;
        $this->view = $view;
        $this->response = $response;
    }

    public function index()
    {
        return $this->view->make('categories.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $this->categoryControllerService->store($request);

        return $this->response->json([
            'message' => 'Categoria registrada exitosamente!'
        ]);
    }

   /**
     * Display the specified resource to edit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryControllerService->find($id);

        return $this->view->make('categories.edit',[
            'category' => $category
        ]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->categoryControllerService->update($request, $id);

        return $this->response->json([
            'message' => 'Categoria actualizada exitosamente!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteCategoryRequest $request, $id)
    {
        $this->categoryControllerService->destroy($id);

        return $this->response->json([
            'message' => 'Categoria eliminada exitosamente!'
        ]);
    }
}
