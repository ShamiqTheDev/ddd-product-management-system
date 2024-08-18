<?php

namespace App\Interfaces\Api;

use App\Application\Services\CreateProductService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Infrastructure\Persistence\EloquentProduct;

class ProductController extends Controller {
    private CreateProductService $createProductService;

    public function __construct(CreateProductService $createProductService) {
        $this->createProductService = $createProductService;
    }

    public function store(Request $request) {
        $product = $this->createProductService->execute($request->name, $request->price);
        return response()->json($product);
    }

    // Other methods for CRUD (index, show, update, destroy)
}
