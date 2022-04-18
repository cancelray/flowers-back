<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
use App\Models\Format;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $colors = Color::all();
        $formats = Format::all();
        $products = Product::all();

        return view('catalog.index', [
            'categories' => $categories,
            'categoryName' => '',
            'colors' => $colors,
            'formats' => $formats,
            'products' => $products
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
            
        }

        $products = Product::where('category_id', $category->id)->get();

        return view('catalog.index', [
            'categories' => $categories,
            'categoryName' => ' / '.$category->name,
            'colors' => $colors,
            'formats' => $formats,
            'products' => $products
        ]);
    }
}
