@extends('layouts.app')

@section('content')

<div class="container">
	<div>
		<h1 class="order-h1"><strong>Votre panier</strong></h1>
	</div>
	<div class="panel panel-default">
		<div class="cart-div">
			<h2 class="order_h2">Récapitulatif de votre panier</h2>
			@if (session('cart'))
			<table class="table table-bordered">
				<tr class="active">
					<th>Nom du produit</th>
					<th>Quantité</th>
					<th>Prix à l'unité</th>
					<th>Prix total</th>
				</tr>
				@foreach ($cart_products as $cart_product)
				<tr>
					<td>{{$cart_product["name"]}}</td>
					<td>{{$cart_product["quantity"]}}</td>
					<td>{{$cart_product["price"] / 100}} €</td>
					<td>{{($cart_product["price"] * $cart_product["quantity"]) / 100}} €</td>
				</tr>
				@endforeach
				<tr>
					<td colspan="3"><strong>Prix total des produits :</strong></td>
					<td><strong>{{$products_total_price / 100}} €</strong></td>
				</tr>
			</table>
			@else
				<h4>Vous n'avez pas de produit dans votre panier</h4>
			@endif
		</div>
	</div>

	<h2 class="order_h2">Finalisez votre commande</h2>
	@if (Route::has('login'))
		@if (Auth::check())
		<div>
			<a class="btn btn-success btn-lg btn-block" href="/order_validation">Finaliser ma commande</a>
		</div>
		@else
		<div>
			<a class="btn btn-success btn-lg btn-block" href="/login">J'ai déjà un compte</a>
		</div>
		<div>
			<a class="btn btn-success btn-lg btn-block" href="/register">Je crée un compte</a>
		</div>
		@endif
	@endif


</div>


@endsection