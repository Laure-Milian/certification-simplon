<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Order_Product;
use Auth;

class AccountController extends Controller
{
	public function index() {
		$user_id = Auth::user()->id;

		$current_orders = Order::where('user_id', $user_id)
		->where('is_delivered', false)
		->get();

		$past_orders = Order::where('user_id', $user_id)
		->where('is_delivered', true)
		->get();
		
		return view('account', ['current_orders' => $current_orders, 'past_orders' => $past_orders]);
	}

	public function deleteUser() {
		$user_id = Auth::user()->id;
		$orders = Order::where('user_id', $user_id)->get();
		foreach ($orders as $order) {
			Order_Product::where('order_id', $order->id)->delete();
			$order->delete();
		}
		$user = User::findOrFail($user_id);
		$user->delete();
		Auth::logout();
		return redirect('/')->with('message', 'Votre compte a bien été supprimé');
	}
}
