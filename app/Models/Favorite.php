<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Favorite extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $primaryKey = 'id';
    protected $table = 'favorites';
    protected $fillable  = ['product_id', 'created_at', 'updated_at'];

    protected $allowedSorts = ['id', 'product_id'];

    protected $allowedFilters = ['id', 'product_id'];
}
