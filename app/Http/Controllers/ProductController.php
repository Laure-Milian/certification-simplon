<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function getHome() {
    	$products = Product::all();
    	return view('accueil', ['products' => $products]);
    }

    public function getProduct($id) {
    	$product = Product::findOrFail($id);
    	return view('show', ['product' => $product]);
    }

    public function findProduct(Request $request) {
    	$products = Product::where('name', 'like', $request->search . '%')->get();
    	return view('accueil', ['products' => $products]);
    }
}
