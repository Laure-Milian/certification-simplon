@extends('layouts.visitor')

@section('content')

<div class="container">
    <div class="card">
        <div class="row">
            <div class="image-wrapper col-md-5">

                <img class="product-image img-responsive" src="http://placekitten.com/400/252" />

            </div>
            <div class="details col-md-7">

                <h2 class="product-title"> {{ $product->name }} </h2>
                <h3 class="product-category"><a href="#category">Catégorie</a></h3> <!-- Injecter la catégorie du livre -->
                <p class="product-description"> {{ $product->description }} </p>
                <h4 class="price">Prix : <span> {{ $product->price / 100 }} </span>€</h4>
                <div class="product-stock">
                    @if ($product->stock === 0)
                        <span class="text-danger">Indisponible</span>
                    @elseif ($product->stock < 10)
                        <span class="text-warning">Plus que {{$product->stock}} article(s) disponible(s)</span>
                    @else
                        <span class="text-success">En Stock</span>
                    @endif
                </div>
                <form class="add-to-cart" action="/add/cart/{product_id}" method="post">
                    <div class="form-group">
                        <label for="quantity">Quantité : </label>
                        <input type="number" class="quantity" name="quantity" value="1" min="0" max="20">
                    </div>
                    <button class="btn btn-success" type="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Ajouter au panier</button>
                </form>

            </div>
        </div>
    </div>
</div>

@stop
