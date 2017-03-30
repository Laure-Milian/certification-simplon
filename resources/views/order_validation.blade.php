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
					<td>{{$products_total_price / 100}} €</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<div class="container">
	<div>
		<h2>Informations de livraison et paiement</h2>
		<div class="panel panel-default">
			<div>
				@if ($known_address)
				<div>
					Votre nom :
				</div>
				<div>
					Adresse : {{$last_order->address}}
				</div>
				<div>
					Code postal : {{$last_order->zip_code}}
				</div>
				<div>
					Ville : {{$last_order->city}}
				</div>
				<div>
					Pays : {{$last_order->country}}
				</div>
				<div>
					Commentaire pour le livreur : {{$last_order->comment}}
				</div>
				<div>
					<a href="/changeAddress">Modifier ces informations</a>
				</div>

				@else

				<form action="/validate_order" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<div class="col-md-8">
							<div>
								<label for="last_name">Nom :</label>
							</div>
							<div>
								<input id="last_name" type="text" name="last_name">
							</div>
							<div>
								<label for="first_name">Prénom :</label>
							</div>
							<div>
								<input id="first_name" type="text" name="first_name">
							</div>
							<div>
								<label for="address">Adresse :</label>
							</div>
							<div>
								<input id="address" type="text" name="address">
							</div>
							<div>
								<label for="zip_code">Code postal :</label>
							</div>
							<div>
								<input id="zip_code" type="number" name="zip_code">
							</div>
							<div>
								<label for="city">Ville :</label>
							</div>
							<div>
								<input id="city" type="text" name="city">
							</div>
							<div>
								<label for="country">Pays :</label>
							</div>
							<div>
								<select id="country" name="country">
									<option>France</option>
								</select>
							</div>
							<div>
								<label for="phone">Numéro de téléphone :</label>
							</div>
							<div>
								<input id="phone" type="number" name="phone">
							</div>
							<div>
								<label for="delivery_comment">Commentaire pour le livreur :</label>
							</div>
							<div>
								<textarea id="delivery_comment" name="delivery_comment"></textarea>
							</div>
						</div>
						<div class="col-md-4">
							<div>
								<label for="shipping_method">Choix du mode de livraison :</label>
							</div>
							<div>
								<select id="shipping_method" name="shipping_method">
									<option value="shipping_method_1">Mode de livraison n°1 - Gratuit</option>
									<option value="shipping_method_2">Mode de livraison n°2 - 0,50€</option>
									<option value="shipping_method_3">Mode de livraison n°3 - 3,00€</option>
								</select>
							</div>
							<div>
								Valeur de la commande : <span class="products_total_price">{{$products_total_price / 100}}</span> €
							</div>
							<div>
								Livraison : <span class="delivery_cost"></span> €
							</div>
							<div>
								Total : <span class="order_total_price"></span> €
							</div>
							<div>
								<label for="paiement_method">Choix du mode de paiement :</label>
							</div>
							<div>
								<select id="paiement_method" name="paiement_method">
									<option>CB</option>
									<option>Paypal</option>
								</select>
							</div>
							<div>
								<input type="submit" name="validate_order" value="Terminer la commande">
							</div>
						</div>
					</form>

					@endif
				
				</div>
			</div>
		</div>
	</div>
	@endsection