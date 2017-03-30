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
							<div class="form-group">
								<label for="last_name">Nom :</label>
								<input id="last_name" class="form-control" type="text" name="last_name">
							</div>
							<div class="form-group">
								<label for="first_name">Prénom :</label>
								<input id="first_name" class="form-control" type="text" name="first_name">
							</div>
							<div class="form-group">
								<label for="address">Adresse :</label>
								<input id="address" class="form-control" type="text" name="address">
							</div>
							<div class="form-group">
								<label for="zip_code">Code postal :</label>
								<input id="zip_code" class="form-control" type="number" name="zip_code">
							</div>
							<div class="form-group">
								<label for="city">Ville :</label>
								<input id="city" class="form-control" type="text" name="city">
							</div>
							<div class="form-group">
								<label for="country">Pays :</label>
								<select id="country" class="form-control" name="country">
									<option>France</option>
								</select>
							</div>
							<div class="form-group">
								<label for="phone">Numéro de téléphone :</label>
								<input id="phone" class="form-control" type="number" name="phone">
							</div>
							<div class="form-group">
								<label for="delivery_comment">Commentaire pour le livreur :</label>
								<textarea id="delivery_comment" class="form-control" name="delivery_comment"></textarea>
							</div>
						</div>
						<div class="col-md-4">
							<div>
								Valeur de la commande : <span class="products_total_price">{{$products_total_price / 100}}</span> €
							</div>
							<div>
								Livraison : <span class="delivery_cost"></span> €
							</div>
							<div>
								Total : <span class="order_total_price"></span> €
							</div>
							<div class="form-group">
								<label for="shipping_method">Choix du mode de livraison :</label>
								<select id="shipping_method" class="form-control" name="shipping_method">
									<option value="shipping_method_1">Mode de livraison n°1 - Gratuit</option>
									<option value="shipping_method_2">Mode de livraison n°2 - 0,50€</option>
									<option value="shipping_method_3">Mode de livraison n°3 - 3,00€</option>
								</select>
							</div>
							<div class="form-group">
								<label for="paiement_method">Choix du mode de paiement :</label>
								<select id="paiement_method" class="form-control" name="paiement_method">
									<option>CB</option>
									<option>Paypal</option>
								</select>
							</div>
							<div>
								<input class="btn btn-primary" type="submit" name="validate_order" value="Terminer la commande">
							</div>
						</div>
					</form>

					@endif
				
				</div>
			</div>
		</div>
	</div>
	@endsection