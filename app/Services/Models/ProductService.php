<?php

namespace App\Services\Models;

use App\Models\Product;

class ProductService extends EloquentService
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    final public function saveImageAndReturnSavePath($image, $directory_path)
    {
        return $this->model->saveImageAndReturnSavePath($image, $directory_path);
    }      

    final function removeImage($image_path)
    {
        return $this->model->removeImage($image_path);
    }
}
