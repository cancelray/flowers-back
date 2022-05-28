<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'formats';
    protected $fillable  = ['product_id', 'count', 'order_id', 'created_at', 'updated_at'];
}
