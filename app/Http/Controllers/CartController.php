<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
    	return view('cart');
    }

    public function addToCart(Request $request) {
    	// if ($request->product_id === )
    	$product_id = $request->product_id;
		$name = $request->name;
		$price = $request->price;
		$quantity = $request->quantity;
		$cart = [];
		array_push($cart, ["product_id" => $product_id, "name" => $name, "price" => $price, "quantity" => $quantity]);
		session(["cart" => $cart]);
		dd(session("cart"));
		$request->session()->flash('success', "Le produit a bien été ajouté au panier");
        return back();
    }

    public function deleteFromCart() {

    }

}
