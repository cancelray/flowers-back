<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Color extends Model
{
    use HasFactory;
    use AsSource;
    
    protected $primaryKey = 'id';
    protected $table = 'colors';
    protected $fillable  = ['color', 'for_checkbox', 'created_at', 'updated_at'];
}
