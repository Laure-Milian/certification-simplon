<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class CartController extends Controller
{
    public function index() {
      if (session()->has('cart')) {
        $cart_products = session('cart');
        $total_price = Order::getTotalProductsPrice($cart_products);
        return view('cart', ['cart_products' => $cart_products, 'products_total_price' => $total_price]);
      }
      else {
    	 return view('cart'); 
      }
    }

    public function addToCart(Request $request) {
      
      // Si pas de panier dans la session, crée un nouveau panier et le stock en session
      if (!$request->session()->has('cart')) {
        $cart = [];
        $product_id = $request->product_id;
        $name = $request->name;
        $price = $request->price;
        $quantity = $request->quantity;
        array_push($cart, ["product_id" => $product_id, "name" => $name, "price" => $price, "quantity" => $quantity]);
        session(['cart' => $cart]);
      }

      else {
        $cart = session("cart");
        
        // On crée un nouveau panier en faisant un map sur celui de la session. Si le produit de la requête est déjà dans le panier de la session, on modifie sa quantité.
        $new_cart = array_map(function($value) use ($request) {
          if ($value["product_id"] == $request->product_id) {
            $value["quantity"] = intval($value["quantity"]) + intval($request->quantity);
          }
          return $value;
        }, $cart);

        // Si l'ancien et le nouveau paniers sont les mêmes, c'est que le produit est un nouveau produit donc il faut l'ajouter au panier en cours. Sinon, c'est qu'il fallait juste modifier la quantité, ce qui a été fait dans le array_map, donc on enregistre le nouveau panier dans la session.
        if ($new_cart === $cart) {
          $product_id = $request->product_id;
          $name = $request->name;
          $price = $request->price;
          $quantity = $request->quantity;
          array_push($cart, ["product_id" => $product_id, "name" => $name, "price" => $price, "quantity" => $quantity]);
          session(['cart' => $cart]);
        }
        else {
          session(['cart' => $new_cart]);
        }

        // Renvoie sur la page précédente avec un message confirmant l'ajout au panier
        $request->session()->flash('success', "Le produit a bien été ajouté au panier");
        return back();
      }

    }

    public function deleteFromCart() {

    }

}
