@extends('layouts.visitor')

@section('content')
<div class="container">

    <h2><strong> Recherche </strong></h2>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 col-xs-11 product-card">
                <div class="card card-content">
                    <div class="image-wrapper-category">
                        <a href="/{{ $product->id }}">
                            <img src="{{ $product->picture }}" class="img-responsive" alt="Photo de {{ $product->name }}">
                        </a>
                    </div>
                    <div class="caption caption-card">
                        <h3 class="category-product-title"><a href="/{{ $product->id }}">{{ $product->name }}</a></h3>

                        <div class="category-product-stock">
                            <h4 class="pull-left"><strong>{{ $product->price / 100 }} €</strong></h4>
                            @if ($product->stock === 0)
                              <div class="text-danger pull-right">Indisponible</div>
                            @else
                              <form action="/add/cart" method="post" class="pull-right">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Ajouter au panier</button>
                              </form>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        @if ($products->isEmpty())
            <p>Aucun produit trouvé.</p>
        @endif
    </div>
</div>

@stop
