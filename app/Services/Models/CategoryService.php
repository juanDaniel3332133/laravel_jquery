<?php

namespace App\Services\Models;

use App\Models\Category;

class CategoryService extends EloquentService
{
	public function __construct(Category $category)
	{
		parent::__construct($category);
	}
}