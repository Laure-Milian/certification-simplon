<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
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
}
