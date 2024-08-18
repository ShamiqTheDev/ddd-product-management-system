<?php 

namespace App\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;

class EloquentProduct extends Model {
    protected $table = 'products';
    protected $fillable = ['name', 'price'];
}
