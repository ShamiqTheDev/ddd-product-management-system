<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Models\Product;
use App\Domain\Repositories\ProductRepository;

class EloquentProductRepository implements ProductRepository {
    private $model;

    public function __construct(EloquentProduct $model) {
        $this->model = $model;
    }

    public function findById(string $id): ?Product {
        $product = $this->model->find($id);
        return $product ? new Product($product->id, $product->name, $product->price) : null;
    }

    public function save(Product $product): void {
        $this->model->updateOrCreate(
            ['id' => $product->getId()],
            ['name' => $product->getName(), 'price' => $product->getPrice()]
        );
    }

    public function delete(string $id): void {
        $this->model->where('id', $id)->delete();
    }

    public function getAll(): array {
        return $this->model->all()->toArray();
    }
}
