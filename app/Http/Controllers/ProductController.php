<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

use App\Services\Controllers\ProductControllerService;

use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Routing\ResponseFactory;

class ProductController extends Controller
{
    private $productControllerService;
    private $reponse;
    private $view;

    public function __construct(
        ProductControllerService $productControllerService,
        ResponseFactory $response,
        ViewFactory $view
    )
    {
        $this->productControllerService = $productControllerService;
        $this->view = $view;
        $this->response = $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->productControllerService->getDataForCreateView();
        
        return $this->view->make('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $this->productControllerService->store($request);

        return $this->response->json([
            'message' => 'Producto registrado exitosamente!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productControllerService->find($id);

        return $this->view->make('products.show',[
            'product' => $product 
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
        $data = $this->productControllerService->getDataForEditView($id);
        $data['product'] = $this->productControllerService->find($id);

        return $this->view->make('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $this->productControllerService->update($request, $id);

        return $this->response->json([
            'message' => 'Producto actualizado exitosamente!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productControllerService->destroy($id);

        return $this->response->json([
            'message' => 'Producto eliminado exitosamente!'
        ]);
    }
}
