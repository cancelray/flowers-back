<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
use App\Models\Format;
use App\Models\Product;
use App\Models\Favorite;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $colors = Color::all();
        $formats = Format::all();
        $products = Product::paginate(9);

        return view('catalog.index', [
            'categories' => $categories,
            'categoryName' => '',
            'colors' => $colors,
            'formats' => $formats,
            'products' => $products,
        ]);
    }

    public function category($translate_name)
    {
        $categories = Category::all();
        $colors = Color::all();
        $formats = Format::all();
        $getCategory = Category::where('translate_name', $translate_name)->get();
        $category = $getCategory[0];

        if ($category->id == 1) {
            $dbFavorites = Favorite::all(); 
            $favoritesId = [];

            foreach ($dbFavorites as $item) {
                $favoritesId[] = $item['product_id'];
            }

            $products = Product::whereIn('id', $favoritesId)->paginate(9);

            return view('catalog.index', [
                'categories' => $categories,
                'categoryName' => ' / '.$category->name,
                'colors' => $colors,
                'formats' => $formats,
                'products' => $products
            ]);
        }

        if ($category->translate_name == 'bouquets') {
            $bouquets = Category::where('translate_name', 'bouquets')->get();
            $roses = Category::where('translate_name', 'rose-bouquets')->get();

            $products = Product::whereIn('category_id', [$bouquets[0]->id, $roses[0]->id])->paginate(9);;

            return view('catalog.index', [
                'categories' => $categories,
                'categoryName' => ' / '.$category->name,
                'colors' => $colors,
                'formats' => $formats,
                'products' => $products
            ]);
        }

        $products = Product::where('category_id', $category->id)->paginate(9);

        return view('catalog.index', [
            'categories' => $categories,
            'categoryName' => ' / '.$category->name,
            'colors' => $colors,
            'formats' => $formats,
            'products' => $products
        ]);
    }

    public function getFromDbByCategory($translate_name) 
    {
        $getCategory = Category::where('translate_name', $translate_name)->get();
        $category = $getCategory[0];

        if ($category->id == 1) {
            $dbFavorites = Favorite::all(); 
            $favoritesId = [];

            foreach ($dbFavorites as $item) {
                $favoritesId[] = $item['product_id'];
            }

            return $products = Product::whereIn('id', $favoritesId)->get();
        }

        if ($category->translate_name == 'bouquets') {
            $bouquets = Category::where('translate_name', 'bouquets') -> get();
            $roses = Category::where('translate_name', 'rose-bouquets') -> get();

            return $products = Product::whereIn('category_id', [$bouquets[0]->id, $roses[0]->id])->get();
        }

        return $products = Product::where('category_id', $category->id)->get();
    }

    public function getFromDb() 
    {
        return $productsFromDb = Product::all();
    }
}

