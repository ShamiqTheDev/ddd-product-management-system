<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Product;

interface ProductRepository {
    public function findById(string $id): ?Product;
    public function save(Product $product): void;
    public function delete(string $id): void;
    public function getAll(): array;
}
