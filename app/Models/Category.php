<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $fillable  = ['name', 'translate_name', 'created_at', 'updated_at'];
}
