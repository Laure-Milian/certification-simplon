@extends('layouts.app')

@section('content')

<div class="container">

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