<?php

namespace App\Services\Controllers;

use App\Services\Models\ProductService;
use App\Services\Models\CategoryService;

class ProductControllerService
{
	private $categoryService;
    private $productService;

	public function __construct(
		ProductService $productService,
		CategoryService $categoryService
	)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function getDataForCreateView()
    {
        $categories = $this->categoryService->all(['id','name']);
        
        return [
            'categories' => $categories 
        ];
    }

    public function store($request)
    {
    	$data = $this->processDataForCreate($request);

    	$product = $this->productService->create($data);

    	$product->categories()->attach($request->categories_ids);

    	return $product; 
    }

    public function find($id)
    {
        return $this->productService->find($id);
    }
        
    private function processDataForCreate($request)
    {
    	$data = $request->all();

    	$data['description'] = $request->description ?? "ninguna";

    	$data['image_path'] = $request->has('image') ? 
                                $this->saveImage($request->image) : 
                                "assets/no-photo.png";

    	return $data;
    }

    public function saveImage($image)
    {
    	$directory_path = "assets/products/photos";
    	return $this->productService->saveImageAndReturnSavePath($image, $directory_path);
    }

    public function getDataForEditView($id)
    {
        $product = $this->find($id); 

        $categories_ids_of_product = $product->categories->map(function($category){
            return $category->id;
        }); 

        return [
            'categories' => $this->categoryService->all(['id','name']),
            'categories_ids_of_product' => $categories_ids_of_product 
        ];
    }

    public function update($request, $id)
    {
    	$product = $this->find($id);

    	$data = $this->processDataForUpdate($request, $product);

    	$product->update($data);

    	$product->categories()->sync($request->categories_ids);

    	return $product; 
    }

    private function processDataForUpdate($request, $product)
    {
    	$data = $request->all();

    	$data['description'] = $request->description ?? "ninguna";

    	if ($request->has('image'))
    	{
            $this->removeProductImage($product);

    		$data['image_path'] = $this->saveImage($request->image);
    	}

    	return $data;
    }

    private function removeProductImage($product)
    {
         if ($product->image_path !== "assets/no-photo.png")
              $this->productService->removeImage($product->image_path);
    }

    public function destroy($id)
    {
        $product = $this->find($id);

        $this->removeProductImage($product);

    	return $this->productService->destroy($id);
    }
}
