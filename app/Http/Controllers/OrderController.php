<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use Auth;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        $cart_products = $_SESSION['cart'];
        $current_user_id = Auth::user()->id;
        $total_price = $this->getTotalPrice($cart_products);
        $last_order = $this->getLastOrder($current_user_id);
     	$known_address = ($last_order) ? true : false;
     	return view('order_validation', ['cart_products' => $cart_products, 'total_price' => $total_price, 'known_address' => $known_address, 'last_order' => $last_order]);
    }

    public function getTotalPrice($cart_products) {
        $total_price = 0;
        foreach ($cart_products as $product) {
            $price_quantity = $product["price"] * $product["quantity"];
            $total_price = $total_price + $price_quantity;
        }
        return $total_price;
    }

    public function getLastOrder($user_id) {
        return Order::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->first();
    }

}