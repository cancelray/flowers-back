<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Category extends Model
{
    use HasFactory;
    use AsSource;

    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable  = ['name', 'translate_name', 'created_at', 'updated_at'];
}
