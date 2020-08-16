<?php

namespace App\Services\Controllers;

use App\Models\Category;

use App\Services\Models\CategoryService;

class CategoryControllerService
{
	private $categoryService;

	public function __construct(
		CategoryService $categoryService
	)
    {
    	$this->categoryService = $categoryService;
    }

    public function store($request)
    {
    	return $this->categoryService->create($request->all());
    }

    public function find($id)
    {
        return $this->categoryService->find($id);
    }
        
    public function update($request, $id)
    {
    	$category = $this->categoryService->find($id);

    	$category->update($request->all());

    	return $category; 
    }

    public function destroy($id)
    {
    	return $this->categoryService->destroy($id);
    }
}
