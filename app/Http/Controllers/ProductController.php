<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    	$products = Product::where('name', 'like', '%' .$request->search . '%')->get();
    	return view('products.search', ['products' => $products]);
    }

    public function getProductCategory($category_id){
        $category = Category::where('id', $category_id)->first();
        return $category;
    }

    public function getCategoryProducts($category_id){
      $products = Product::where('category_id', $category_id)->get();
      $category = $this->getProductCategory($category_id);

      $authors = $this->getAuthorFilter($category_id);
      $released_years = $this->getReleasedYearFilter($category_id);
      return view('products.category', compact(['products', 'category', 'authors', 'released_years']));
    }

    public function getAuthorFilter($category_id){
        $authors = DB::table('products')->where('category_id', $category_id)->select('author')->distinct()->get();
        return $authors;
    }

    public function getReleasedYearFilter($category_id){
        $released_years = DB::table('products')->where('category_id', $category_id)->select('released_year')->distinct()->get();
        return $released_years;
    }

    public function postFilterCategory(Request $request) { // A terminer
        $category_id = $request->category_id;
        $author = $request->author;
        $released_year = $request->released_year;
        $stock = $request->stock ? true : false; // False === tous produits


        if($author && $released_year && !$stock){
          $products = Product::where('category_id', $category_id)
          ->where('author', $author)
          ->where('released_year', $released_year)
          ->get();
        }
        else if ($author && !$stock){
            $products = Product::where('category_id', $category_id)
            ->where('author', $author)
            ->get();
        }
        else if ($released_year && !$stock){
            $products = Product::where('category_id', $category_id)
            ->where('released_year', $released_year)
            ->get();
        }
        else if ($stock && $author && $released_year){
            $products = Product::where('category_id', $category_id)
            ->where('author', $author)
            ->where('released_year', $released_year)
            ->where('stock', '>', 0)
            ->get();
        }
        else if($stock && $author){
            $products = Product::where('category_id', $category_id)
            ->where('author', $author)
            ->where('stock', '>', 0)
            ->get();
        }
        else if($stock && $released_year){
            $products = Product::where('category_id', $category_id)
            ->where('released_year', $released_year)
            ->where('stock', '>', 0)
            ->get();
        }
        else if($stock){
            $products = Product::where('category_id', $category_id)
            ->where('stock', '>', 0)
            ->get();
        }
        else {
            $products = Product::where('category_id', $category_id)
            ->get();
        }

        $category = $this->getProductCategory($category_id);
        $authors = $this->getAuthorFilter($category_id);
        $released_years = $this->getReleasedYearFilter($category_id);
        return view('products.category', compact(['products', 'category', 'authors', 'released_years']));
    }

}
