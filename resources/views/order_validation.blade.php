@extends('layouts.app')

@section('content')


<div class="container">
	@if (Session::has('fail'))
	<div class="alert alert-danger" role="alert">
		Une erreur a été détectée, votre commande n'a pas été enregistrée. Veuillez contacter le service client (contact@loutre-pirate.com) en précisant ce message d'erreur : {{Session::get('fail')}}
	</div>
	@endif
	<div>
		<h1 class="order-h1"><strong>Finalisez votre commande</strong></h1>
	</div>
		<div class="panel panel-default">
		<div class="cart-div">
		<h2 class="order_h2">Récapitulatif de votre panier</h2>
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
		</div>
	</div>
</div>

<div class="container">
		<div class="panel panel-default">
			<div>
				<form action="/validate_order" method="post">
					{{csrf_field()}}
					<input type="hidden" class="known_address" value="{{$known_address}}"></span>
					<input type="hidden" class="last_order" value="{{$last_order}}"></span>
					<div class="row">
					<div class="order_infos_col">
						<div class="col-md-8">
						<h2 class="order_h2">Informations de livraison et paiement</h2>
						<h5 class="order_h5">Les champs marqués d'un * sont obligatoire</h5>
							<div class="form-group">
								<label for="last_name">Nom*</label>
								<input required id="last_name" class="form-control" type="text" name="last_name">
							</div>
							<div class="form-group">
								<label for="first_name">Prénom*</label>
								<input required id="first_name" class="form-control" type="text" name="first_name">
							</div>
							<div class="form-group">
								<label for="address">Adresse*</label>
								<input required id="address" class="form-control" type="text" name="address">
							</div>
							<div class="form-group">
								<label for="zip_code">Code postal*</label>
								<input required id="zip_code" class="form-control" type="text" name="zip_code" pattern="^[0-9]{5}$">
							</div>
							<div class="form-group">
								<label for="city">Ville*</label>
								<input required id="city" class="form-control" type="text" name="city">
							</div>
							<div class="form-group">
								<label for="country">Pays*</label>
								<select id="country" class="form-control" name="country">
									<option value="france">France</option>
								</select>
								<small class="form-text text-muted">Pour l'instant, la livraison n'est disponible que pour la France</small>
							</div>
							<div class="form-group">
								<label for="phone">Numéro de téléphone*</label>
								<input required id="phone" type="tel" class="form-control" name="phone" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$">
								<small class="form-text text-muted">Un numéro de téléphone valide (FR) est nécessaire pour la commande</small>
							</div>
							<div class="form-group">
								<label for="delivery_comment">Commentaire pour le livreur</label>
								<textarea id="delivery_comment" class="form-control" name="delivery_comment"></textarea>
							</div>
							</div>
						</div>
						<div class="col-md-4">
						<div class="order_paiement_col">
							<div class="order_price_div alert alert-info">
								<div>
									Produits : <span class="products_total_price">{{$products_total_price / 100}}</span> €
								</div>
								<div>
									Livraison : <span class="delivery_cost"></span> €
								</div>
								<div>
									<strong>Total : <span class="order_total_price"></span> €</strong>
								</div>
							</div>
							<div class="form-group">
								<label for="shipping_method">Mode de livraison</label>
								<select id="shipping_method" class="form-control" name="shipping_method">
									<option value="point-relais">Point Relais - Gratuit</option>
									<option value="colissimo">Colissimo - 0,50€</option>
									<option value="chronopost">Chronospost - 3,00€</option>
								</select>
							</div>
							<div class="form-group">
								<label for="paiement_method">Mode de paiement</label>
								<select id="paiement_method" class="form-control" name="paiement_method">
									<option>CB</option>
									<option>Paypal</option>
								</select>
							</div>
							<div>
								<input class="btn btn-success btn-lg btn-block" type="submit" name="validate_order" value="Payer la commande">
							</div>
						</div>
						</div>
					</form>

				</div>
			</div>
	</div>
	@endsection