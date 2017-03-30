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
        $last_order = $this->getLastOrder(9);
     	$known_address = ($last_order) ? true : false;
     	return view('order_validation', ['cart_products' => $cart_products, 'products_total_price' => $total_price, 'known_address' => $known_address, 'last_order' => $last_order]);
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

    public function checkInfos(Request $request) {
        $this->saveOrder($request);
    }

    public function saveOrder($inputs) {
        $order = new Order;
        $order->total_price = 800;
        $order->phone = $inputs->phone;
        $order->address = $inputs->address;
        $order->zip_code = $inputs->zip_code;
        $order->city = $inputs->city;
        $order->country = $inputs->country;
        $order->comment = $inputs->delivery_comment;
        $order->is_paid = false;
        $order->is_sent = false;
        $order->is_delivered = false;
        $order->user_id = Auth::user()->id;
        $order->save();

        //$order->products = 
    }
}