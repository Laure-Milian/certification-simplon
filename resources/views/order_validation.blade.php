@extends('layouts.app')

@section('content')

<div class="container">
	<div>
		<h1>Valider votre commande</h1>
	</div>
	<div>
		<h2>Récapitulatif de votre panier</h2>
		<div class="panel panel-default">
			<table class="table">
				<tr>
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
					<td colspan="3">Total de la commande : </td>
					<td>{{$total_price / 100}} €</td>
				</tr>
			</table>
		</div>
	</div>
	<div>
		<h2>Livraison</h2>
		<div class="panel panel-default">
			<div>
				Votre adresse :
			</div>
			<div>
				Choisir un mode de livraison :
				- Lettre verte / Ecopli - Gratuit
				- Lettre suivie - 0,50€
			</div>
		</div>
	</div>
	<div>
		<h2>Paiement</h2>
		<div class="panel panel-default">
			<div>
				Valeur de la commande : 40€
			</div>
			<div>
				Livraison : 5€
			</div>
			<div>
				Total : 45€
			</div>
			<div>
				Choisir un moyen de paiement :
				- CB
				- Paypal
			</div>
		</div>
	</div>
</div>

@endsection