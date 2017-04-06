@extends('layouts.app')

@section('content')

<div class="container">
	<div class="alert alert-danger" role="alert">
		<h1>Voulez-vous vraiment supprimer votre compte ?</h1>
		Cette action est définitive. Elle supprimera l'historique de vos commandes et toutes les informations liées à votre compte.
	</div>
	<div>
		<a class="btn btn-danger btn-lg" href="/delete/confirm">Supprimer mon compte définitivement</a>
		<a class="btn btn-success btn-lg" href="/">Retourner sur le site</a>
	</div>
</div>

@stop