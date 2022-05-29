<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Format extends Model
{
    use HasFactory;
    use AsSource;
        
    protected $primaryKey = 'id';
    protected $table = 'formats';
    protected $fillable  = ['format', 'for_checkbox', 'created_at', 'updated_at'];
}
