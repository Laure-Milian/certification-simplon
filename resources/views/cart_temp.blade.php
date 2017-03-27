@extends('layouts.app')

@section('content')

<div class="container">

<?php 
session_start() ;
$_SESSION["cart"] = [
	[ "product_id" => 1, "quantity" => 2 ],
	[ "product_id" => 2, "quantity" => 4]
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