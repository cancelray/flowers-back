<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }

        $cart = $this->getCartFromSession();
        

        if (!isset($cart[$id])) {
            $cart[$id] = 1;
        } else {
            $cart[$id]++;
        }

        session()->put('cart', $cart);
    }

    public function removeFromCart($id)
    {
        $cart = $this->getCartFromSession();

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);
    }

    public function decrement($id) 
    {
        $cart = $this->getCartFromSession();

        if ($cart[$id] > 1) {
            $cart[$id]--;
        } else {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);
    }

    public function increment($id) 
    {
        $this->addToCart($id);
    }

    public function getProducts()
    {
        $cart = $this->getCartFromSession();
        $dbProducts = Product::whereIn('id', array_keys($cart))->get();

        $products = [];
        foreach ($dbProducts as $dbProduct) {
            $products[$dbProduct->id] = $dbProduct;
        }

        $totalPrice = 0;
        $totalCount = 0;

        $productsToDisplay = [];
        foreach ($cart as $productId => $count) {
            $totalPrice += $products[$productId]['price'] * $count;
            $totalCount += $count;

            $productsToDisplay[] = [
                'id' => $productId,
                'name' => $products[$productId]['name'],
                'translate_name' => $products[$productId]['translate_name'],
                'price' => $products[$productId]['price'],
                'img' => $products[$productId]['img'],
                'count' => $count
            ];
        }
        
        $productsToDisplay[]['totalPrice'] = $totalPrice;
        $productsToDisplay[]['totalCount'] = $totalCount;

        return $productsToDisplay;
    }

    protected function getCartFromSession() 
    {
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [];
        }

        return $cart;
    }

    protected function cartClear()
    {
        session()->put('cart', []);
    }
}
