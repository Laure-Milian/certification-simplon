<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Order_Product;
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
        $total_price = $this->getTotalProductsPrice($cart_products);
        $last_order = $this->getLastOrder($current_user_id);
        $known_address = ($last_order) ? "true" : "false";
        return view('order_validation', ['cart_products' => $cart_products, 'products_total_price' => $total_price, 'known_address' => $known_address, 'last_order' => $last_order]);
    }

    public function getTotalProductsPrice($cart_products) {
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

    public function sendOrder(Request $request) {
        try {
        session_start();
        $this->validate($request, [
            'first_name' => 'string',
            'last_name' => 'string',
            'address' => 'string',
            'zip_code' => 'numeric',
            'city' => 'string',
            'country' => 'string',
            'phone' => 'numeric',
            'comment' => 'string|nullable',
            'shipping_method' => 'string',
            'paiement_method' => 'string'
            ]);
        $this->reduceStock($request);
        $this->saveOrder($request);
        return redirect('/account')->with('message', 'Votre commande a bien été enregistrée ! Vous pouvez suivre son avancée ici.');
        } catch(\Exception $e) {
            $request->session()->flash('fail', $e->getMessage());
            return back();
        }
    }

    public function getCosts($shipping_method) {
        if ($shipping_method === "point-relais") {
            return 0;
        }
        else if ($shipping_method === "colissimo") {
            return 50;
        }
        else if ($shipping_method === "chronopost") {
            return 300;
        }
    }

    public function reduceStock($request) {
        $cart_products = $_SESSION['cart'];
        foreach ($cart_products as $product) {
            $product_in_db = Product::findOrFail($product["product_id"]);
            $product_in_db->stock = $product_in_db->stock - $product["quantity"];
            $product_in_db->save();
        }
    }

    public function saveOrder($inputs) {
        $cart_products = $_SESSION['cart'];

        $order = new Order;
        //INFOS DESTINATAIRE
        $order->first_name = $inputs->first_name;
        $order->last_name = $inputs->last_name;
        $order->address = $inputs->address;
        $order->zip_code = $inputs->zip_code;
        $order->city = $inputs->city;
        $order->country = $inputs->country;
        $order->phone = $inputs->phone;
        $order->comment = $inputs->delivery_comment;
        // INFOS PAIEMENT ET LIVRAISON
        $order->products_total_price = $this->getTotalProductsPrice($cart_products);
        $order->shipping_cost = $this->getCosts($inputs->shipping_method);
        $order->total_price = $this->getTotalProductsPrice($cart_products) + $this->getCosts($inputs->shipping_method);
        $order->shipping_method = $inputs->shipping_method;
        $order->paiement_method = $inputs->paiement_method;
        $order->is_paid = true;
        $order->is_sent = false;
        $order->is_delivered = false;
        $order->user_id = Auth::user()->id;
        $order->save();

        foreach ($cart_products as $product) {
            Order_Product::create([
                'order_id' => $order->id,
                'product_id' => $product["product_id"],
                'quantity_product' => $product["quantity"]
            ]);
        }

    }

}