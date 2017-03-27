@extends('layouts.app')

@section('content')

<div class="container">
<?php var_dump($_SESSION["cart"]) ?>
	<div>
		<h1>Valider votre commande</h1>
	</div>
	<div>
		<h2>Récapitulatif de votre panier</h2>
		<div class="panel panel-default">
			<table class="table">
				<tr>
					<th>Produit</th>
					<th>Quantité</th>
					<th>Prix</th>
				</tr>
				<tr>
					<td>Bla</td>
					<td>Bla</td>
					<td>Bla</td>
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