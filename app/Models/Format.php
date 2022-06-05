<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Format extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
        
    protected $primaryKey = 'id';
    protected $table = 'formats';
    protected $fillable  = ['format', 'for_checkbox', 'created_at', 'updated_at'];
    
    protected $allowedSorts = ['id', 'format', 'for_checkbox', 'created_at', 'updated_at'];

    protected $allowedFilters = ['id', 'format', 'for_checkbox', 'created_at', 'updated_at'];
}
