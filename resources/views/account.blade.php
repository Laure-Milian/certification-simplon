@extends('layouts.app')

@section('content')

<div class="container">
	@if (session('message'))
	<div class="alert alert-success" role="alert">{{session('message')}}</div>
	@endif
	<div>
		<h1 class="account-h1"><strong>Votre compte</strong></h1>
	</div>
	<div class="panel panel-default">
		<div class="account-div">
			<h2 class="account-h2">Commande(s) en cours</h2>
			@if ($current_orders->isEmpty())
			<h3 class="account-h3">Vous n'avez pas de commande en cours</h3>
			@else
			<table class="table table-bordered">
				<tr class="active">
					<th>N°</th>
					<th>Date d'enregistrement</th>
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
					<td>{{$current_order->created_at}}</td>
					<td>{{$current_order->last_name}} {{$current_order->first_name}}</td>
					<td>{{$current_order->address}}</td>
					<td>{{$current_order->shipping_method}}</td>
					<td>{{$current_order->total_price / 100}} €</td>
					@if ($current_order->is_paid)
					<td class="center-table-account"><span class="glyphicon glyphicon-ok text-success lead" aria-hidden="true"></span></td>
					@else
					<td class="center-table-account"><span class="glyphicon glyphicon-remove text-danger lead" aria-hidden="true"></span></td>
					@endif
					@if ($current_order->is_sent)
					<td class="center-table-account"><span class="glyphicon glyphicon-ok text-success lead" aria-hidden="true"></span></td>
					@else
					<td class="center-table-account"><span class="glyphicon glyphicon-remove text-danger lead" aria-hidden="true"></span></td>
					@endif
					@if ($current_order->is_delivered)
					<td class="center-table-account"><span class="glyphicon glyphicon-ok text-success lead" aria-hidden="true"></span></td>
					@else
					<td class="center-table-account"><span class="glyphicon glyphicon-remove text-danger lead" aria-hidden="true"></span></td>
					@endif
				</tr>
				@endforeach
			</table>
			@endif
		</div>
	</div>
	<div class="panel panel-default">
		<div class="account-div">
			<h2 class="account-h2">Commande(s) passée(s)</h2>
			@if ($past_orders->isEmpty())
			<h3 class="account-h3">Vous n'avez pas de commande passées</h3>
			@else
			<table class="table table-bordered">
				<tr class="active">
					<th>N°</th>
					<th>Date d'enregistrement</th>
					<th>Nom du destinataire</th>
					<th>Adresse de livraison</th>
					<th>Méthode de livraison</th>
					<th>Coût total de la commande</th>
					<th>Reçue le</th>
				</tr>
				@foreach ($past_orders as $past_order)
				<tr>
					<td>{{$past_order->id}}</td>
					<td>{{$past_order->created_at}}</td>
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
	</div>
	<div>
		<a href='/delete'>Supprimer mon compte</a>
	</div>
</div>


@endsection