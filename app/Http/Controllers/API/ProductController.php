<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Models\ProductService;

class ProductController extends Controller
{
    private $productService;

    public function __construct(
        ProductService $productService
    )
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts()
    {
        return response()->json([
            'products' => $this->productService->all()
        ]);
    }
}
