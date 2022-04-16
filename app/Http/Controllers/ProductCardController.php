<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductCardController extends Controller
{
    public function index()
    {
        return view('product-card.index');
    }
}
