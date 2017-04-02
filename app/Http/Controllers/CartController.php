<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
    	return view('cart');
    }

    public function addToCart(Request $request) {
    	$product_id = $request->product_id;
		$name = $request->name;
		$price = $request->price;
		$quantity = $request->quantity;
		dd($quantity . $name . $price . $product_id);
    }

    public function deleteFromCart() {

    }

}
