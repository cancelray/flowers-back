<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Category extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable  = ['name', 'translate_name', 'created_at', 'updated_at'];

    protected $allowedSorts = ['id', 'name', 'translate_name', 'created_at', 'updated_at'];

    protected $allowedFilters = ['id', 'name', 'translate_name', 'created_at', 'updated_at'];
}
