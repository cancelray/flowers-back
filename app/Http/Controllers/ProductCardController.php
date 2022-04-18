<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Favorite;

class ProductCardController extends Controller
{
    public function index($translate_name)
    {
        $product = Product::where('translate_name', $translate_name)->get();

        $favoriteProductsId = Favorite::get('product_id');
        $favoriteProductsIdArr = [];

        foreach($favoriteProductsId as $item) {
            $favoriteProductsIdArr[] = $item->product_id;
        }

        $favoriteProducts = Product::whereIn('id', $favoriteProductsIdArr)->get();

        return view('product-card.index', [
            'product' => $product[0],
            'favoriteProducts' => $favoriteProducts
        ]);
    }
}
