<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
    	return view('cart');
    }

    public function addToCart(Request $request) {

    	if (!$request->session()->has('cart')) {
    		$cart = [];
    		$product_id = $request->product_id;
			$name = $request->name;
			$price = $request->price;
    		$quantity = $request->quantity;
    		array_push($cart, ["product_id" => $product_id, "name" => $name, "price" => $price, "quantity" => $quantity]);
    		session()->put('cart', $cart);
    		dd(session("cart"));
    	}

  //   	else {

  //   	}

  //   	if ($request->session()->has('cart')) {
  //   		$cart = session("cart");    		
  //   		foreach ($cart as $product) {
  //   			if($product["product_id"] == $request->product_id) {
  //   				$product["quantity"] = $product["quantity"] + $request->quantity;
  //   			}
  //   			else {
  //   				$product_id = $request->product_id;
		// 			$name = $request->name;
		// 			$price = $request->price;
  //   				$quantity = $request->quantity;
  //   			}
  //   		}
  //   	}
  //   	else {
  //   	$product_id = $request->product_id;
		// $name = $request->name;
		// $price = $request->price;
  //   	$quantity;
		// 	$cart = [];
		// 	$quantity = $request->quantity;
  //   	}
    	

		// session(["cart" => $cart]);
		// dd(session("cart"));
		// $request->session()->flash('success', "Le produit a bien été ajouté au panier");
  //       return back();
    }

    public function deleteFromCart() {

    }

}
