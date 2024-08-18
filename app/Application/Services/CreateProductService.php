<?php

namespace App\Application\Services;

use App\Domain\Models\Product;
use App\Domain\Repositories\ProductRepository;

class CreateProductService {
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function execute(string $name, float $price): Product {
        $product = new Product(uniqid(), $name, $price);
        $this->productRepository->save($product);
        return $product;
    }
}
