<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;

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

    public function clear() 
    {
        $cart = $this->getCartFromSession();

        foreach($cart as $id => $product) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);
    }

    public function cartCheckout(Request $request) 
    {
        $freeDeliveryThreshold = 2500;
        $delivery = 300;

        $cart = $this->getCartFromSession();
        $jsonOrderInfo = $request->getContent();
        $orderInfo = json_decode($jsonOrderInfo);

        $products = $this->getProducts();
        $totalPrice = $products[count($products) - 2]['totalPrice'];

        $date = date("Y-m-d H:i:s");

        if ($totalPrice < $freeDeliveryThreshold) {
            $totalPrice += $delivery;
        }

        if ($orderInfo->courierDelivery) {
            $deliveryType = 'Курьером';
        } else {
            $deliveryType = 'Самовывоз';
        }

        $orderId = DB::table('orders')->insertGetId([
            'name' => $orderInfo->name,
            'phone' => $orderInfo->phone,
            'email' => $orderInfo->email,
            'recipient_phone' => $orderInfo->receiverPhone,
            'recipient_name' => $orderInfo->receiverName,
            'comment' => $orderInfo->comment,
            'delivery_type' => $deliveryType,
            'delivery_city' =>  $orderInfo->deliveryCity,
            'delivery_street' => $orderInfo->deliveryStreet,
            'delivery_bldng' => $orderInfo->deliveryBuilding,
            'delivery_house' => $orderInfo->deliveryHouse,
            'delivery_room' => $orderInfo->deliveryRoom,
            'delivery_time' => $orderInfo->deliveryTime,
            'payment_type' => $orderInfo->payment,
            'full_price' => $totalPrice,
            'is_paid' => 0,
            'is_complite' => 0,
            'created_at' => $date,	
            'updated_at' => $date
        ]);

        foreach($cart as $productId => $count) {
            DB::table('order_products')->insert([
                'product_id' => $productId,
                'count' => $count,
                'order_id' => $orderId,
                'created_at' => $date,	
                'updated_at' => $date
            ]);
        }

        // return response()->json("success");
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
