<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';

	public $guarded = ['id'];

	public static function getLastOrder($user_id) {
        return Order::where('user_id', $user_id)
        ->orderBy('created_at', 'desc')
        ->first();
    }

	public static function getTotalProductsPrice($cart_products) {
		$total_price = 0;
		foreach ($cart_products as $product) {
			$price_quantity = $product["price"] * $product["quantity"];
			$total_price = $total_price + $price_quantity;
		}
		return $total_price;
	}

	public static function getDeliveryCost($shipping_method) {
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

}
