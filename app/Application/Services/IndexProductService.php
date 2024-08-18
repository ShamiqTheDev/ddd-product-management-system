<?php

namespace App\Application\Services;

use App\Domain\Models\Product;
use App\Domain\Repositories\ProductRepository;

class IndexProductService {
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    /**
     * This should return an array of Product objects.
     *
     * @return Product[]
     */
    public function execute(): array {
        $products = $this->productRepository->getAll();
        return $products;
    }
}
