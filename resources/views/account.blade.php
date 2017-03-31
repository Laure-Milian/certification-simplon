@extends('layouts.app')

@section('content')

<div class="container">
	<div>
		<h1 class="order-h1"><strong>Votre compte</strong></h1>
	</div>
	<div class="panel panel-default">
		<h2 class="order_h2">Commande(s) en cours</h2>
		@if ($current_orders->isEmpty())
		<h3>Vous n'avez pas de commande en cours</h3>
		@else
		<table class="table table-bordered">
			<tr class="active">
				<th>N° de commande</th>
				<th>Nom du destinataire</th>
				<th>Adresse de livraison</th>
				<th>Méthode de livraison</th>
				<th>Coût total de la commande</th>
				<th>Commande payée</th>
				<th>Commande envoyée</th>
				<th>Commande reçue</th>
			</tr>
			@foreach ($current_orders as $current_order)
			<tr>
				<td>{{$current_order->id}}</td>
				<td>{{$current_order->last_name}} {{$current_order->first_name}}</td>
				<td>{{$current_order->address}}</td>
				<td>{{$current_order->shipping_method}}</td>
				<td>{{$current_order->total_price / 100}} €</td>
				@if ($current_order->is_paid)
				<td><span class="glyphicon glyphicon-ok text-success lead" aria-hidden="true"></span></td>
				@else
				<td><span class="glyphicon glyphicon-remove text-danger lead" aria-hidden="true"></span></td>
				@endif
				@if ($current_order->is_sent)
				<td><span class="glyphicon glyphicon-ok text-success lead" aria-hidden="true"></span></td>
				@else
				<td><span class="glyphicon glyphicon-remove text-danger lead" aria-hidden="true"></span></td>
				@endif
				@if ($current_order->is_delivered)
				<td><span class="glyphicon glyphicon-ok text-success lead" aria-hidden="true"></span></td>
				@else
				<td><span class="glyphicon glyphicon-remove text-danger lead" aria-hidden="true"></span></td>
				@endif
			</tr>
			@endforeach
		</table>
		@endif
	</div>
	<div class="panel panel-default">
		<h2 class="order_h2">Historique des commandes</h2>
		@if ($past_orders->isEmpty())
		<h3>Vous n'avez pas de commande passées</h3>
		@else
		<table class="table table-bordered">
			<tr class="active">
				<th>N° de commande</th>
				<th>Nom du destinataire</th>
				<th>Adresse de livraison</th>
				<th>Méthode de livriason</th>
				<th>Coût total de la commande</th>
				<th>Reçue le</th>
			</tr>
			@foreach ($past_orders as $past_order)
			<tr>
				<td>{{$past_order->id}}</td>
				<td>{{$past_order->last_name}} {{$past_order->first_name}}</td>
				<td>{{$past_order->address}}</td>
				<td>{{$past_order->shipping_method}}</td>
				<td>{{$past_order->total_price / 100}} €</td>
				<td>{{$past_order->delivery_date / 100}}</td>
			</tr>
			@endforeach
		</table>
		@endif
	</div>
	<div>
		<button>Supprimer mon compte</button>
	</div>
</div>


@endsection