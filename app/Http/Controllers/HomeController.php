<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Favorite;

class HomeController extends Controller
{
    public function index()
    {
        $favoriteProductsId = Favorite::get('product_id');
        $favoriteProductsIdArr = [];

        foreach($favoriteProductsId as $item) {
            $favoriteProductsIdArr[] = $item->product_id;
        }

        $favoriteProducts = Product::whereIn('id', $favoriteProductsIdArr)->get();

        return view('home.index', ['favoriteProducts' => $favoriteProducts]);
    }
}
