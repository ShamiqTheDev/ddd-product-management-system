<?php

namespace App\Interfaces\Api;

use App\Application\Services\CreateProductService;
use App\Application\Services\IndexProductService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Infrastructure\Persistence\EloquentProduct;

class ProductController extends Controller {
    private CreateProductService $createProductService;
    private IndexProductService $indexProductService;

    public function __construct(
        IndexProductService $indexProductService,
        CreateProductService $createProductService,
    ) {
        $this->indexProductService = $indexProductService;
        $this->createProductService = $createProductService;
    }

    public function index() {
        $product = $this->indexProductService->execute();
        return response()->json($product);
    }

    public function store(Request $request) {
        $product = $this->createProductService->execute($request->name, $request->price);
        return response()->json($product);
    }

    // Other methods for CRUD (show, update, destroy)
}
