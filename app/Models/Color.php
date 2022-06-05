<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Color extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    
    protected $primaryKey = 'id';
    protected $table = 'colors';
    protected $fillable  = ['color', 'for_checkbox', 'created_at', 'updated_at'];

    protected $allowedSorts = ['id', 'color', 'for_checkbox', 'created_at', 'updated_at'];

    protected $allowedFilters = ['id', 'color', 'for_checkbox', 'created_at', 'updated_at'];
}
