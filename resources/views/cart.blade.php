@extends('layouts.app')

@section('content')

<div class="container">

<?php 
session_start() ;
$_SESSION["cart"] = [
	[ "product_id" => 1, "name" => "carotte", "price" => 200, "quantity" => 1 ],
	[ "product_id" => 2, "name" => "blé", "price" => 450, "quantity" => 2],
	[ "product_id" => 3, "name" => "sel", "price" => 500, "quantity" => 3]
];
?>

<div>
	Votre panier :
	
</div>

<!-- CODE A RECUPERER LAURE -->

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

<!-- FIN CODE A RECUPERER LAURE -->
</div>


@endsection