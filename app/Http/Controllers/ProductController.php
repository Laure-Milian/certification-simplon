<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function getHome() {
    	$products = Product::all();
    	return view('accueil', ['products' => $products]);
    }

    public function getProduct($id) {
    	$product = Product::findOrFail($id);
        $category = $this->getProductCategory($product->category_id);
    	return view('products.details', ['product' => $product, 'category' => $category]);
    }

    public function findProduct(Request $request) {
    	$products = Product::where('name', 'like', $request->search . '%')->get();
    	return view('accueil', ['products' => $products]);
    }

    public function getProductCategory($category_id){
        $category = Category::where('id', $category_id)->first();
        return $category->name;
    }

    public function getCategoryProducts($category_id){
      $products = Product::where('category_id', $category_id)->get();
      $category = $this->getProductCategory($category_id);
      return view('products.category', ['products' => $products, 'category' => $category]);
    }

}
