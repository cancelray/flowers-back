<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class OrderProduct extends Model
{
    use HasFactory;
    use AsSource;

    protected $primaryKey = 'id';
    protected $table = 'order_products';
    protected $fillable  = ['product_id', 'count', 'order_id', 'created_at', 'updated_at'];
}
