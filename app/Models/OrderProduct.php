<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class OrderProduct extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $primaryKey = 'id';
    protected $table = 'order_products';
    protected $fillable  = ['product_id', 'count', 'order_id', 'created_at', 'updated_at'];

    protected $allowedSorts = ['order_id'];

    protected $allowedFilters = ['product_id', 'order_id'];
}