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
    	// Récupère les données de la session
    	session_start();
    	$cart_products = $_SESSION['cart'];
    	$total_price = 0;
    	// Détermine le prix total de la commande
    	foreach ($cart_products as $cart_product) {
    		$price_quantity = $cart_product["price"] * $cart_product["quantity"];
    		$total_price = $total_price + $price_quantity;
    	}
        // Vérifie si l'utilisateur a déjà passé une commande
        $current_user_id = Auth::user()->id;
     	$last_order = Order::where('user_id', $current_user_id)
     	->orderBy('created_at', 'desc')
     	->first();
     	$known_address = ($last_order) ? true : false;
   		// Retourne la vue
     	return view('order_validation', ['cart_products' => $cart_products, 'total_price' => $total_price, 'known_address' => $known_address]);
    }


}