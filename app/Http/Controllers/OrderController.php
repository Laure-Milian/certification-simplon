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
        $cart_products = session('cart');
        $current_user_id = Auth::user()->id;
        $total_price = Order::getTotalProductsPrice($cart_products);
        $last_order = Order::getLastOrder($current_user_id);
        $known_address = ($last_order) ? "true" : "false";
        return view('order_validation', ['cart_products' => $cart_products, 'products_total_price' => $total_price, 'known_address' => $known_address, 'last_order' => $last_order]);
    }

    public function createOrder(Request $request) {
        try {
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

    public function reduceStock($request) {
        $cart_products = session('cart');
        foreach ($cart_products as $product) {
            $product_in_db = Product::findOrFail($product["product_id"]);
            $product_in_db->stock = $product_in_db->stock - $product["quantity"];
            $product_in_db->save();
        }
    }

    public function saveOrder($inputs) {
        $cart_products = session('cart');
        $products_total_price = Order::getTotalProductsPrice($cart_products);
        $delivery_cost = Order::getDeliveryCost($inputs->shipping_method);

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
        $order->products_total_price = $products_total_price;
        $order->shipping_cost = $delivery_cost;
        $order->total_price = $products_total_price + $delivery_cost;
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