@extends('layouts.app')

@section('content')

<div class="container">

<?php 
session_start() ;
$_SESSION["cart"] = [
	[ "product_id" => 1, "name" => "carotte", "price" => 200, "quantity" => 2 ],
	[ "product_id" => 2, "name" => "blé", "price" => 450, "quantity" => 4],
	[ "product_id" => 3, "name" => "sel", "price" => 500, "quantity" => 40]
];
?>

<!-- CODE A RECUPERER LAURE -->

@if (Route::has('login'))
	@if (Auth::check())
	<div>
		<a href="/order_validation">Finaliser ma commande</a>
	</div>
	@else
	<div>
		<a href="/login">J'ai déjà un compte</a>
	</div>
	<div>
		<a href="/register">Je crée un compte</a>
	</div>
	@endif
@endif

<!-- FIN CODE A RECUPERER LAURE -->
</div>


@endsection