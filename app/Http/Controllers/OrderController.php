<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;

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
    	// Récupère les données de la session
    	session_start();
    	$cart_products = $_SESSION['cart'];
    	$total_price = 0;
    	// Détermine le prix total de la commande
    	foreach ($cart_products as $cart_product) {
    		$price_quantity = $cart_product["price"] * $cart_product["quantity"];
    		$total_price = $total_price + $price_quantity;
    	}
   		// Retourne la vue
        return view('order_validation', ['cart_products' => $cart_products, 'total_price' => $total_price]);
    }
}