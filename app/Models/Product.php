<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Product extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable  = ['name', 'translate_name', 'price', 'category_id', 'composition', 'format_id', 'color_id', 'img', 'created_at', 'updated_at'];

    protected $allowedSorts = ['id', 'name', 'translate_name', 'price', 'category_id', 'format_id', 'color_id', 'created_at', 'updated_at'];

    protected $allowedFilters = ['id', 'name', 'category_id', 'format_id', 'color_id', 'composition', 'created_at', 'updated_at'];
}
