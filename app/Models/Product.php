<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Orchid\Screen\AsSource;

class Product extends Model
{
    use HasFactory;
    use AsSource;

    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable  = ['name', 'translate_name', 'price', 'category_id', 'composition', 'format_id', 'color_id', 'img', 'created_at', 'updated_at'];
}
