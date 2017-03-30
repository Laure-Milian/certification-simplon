@extends('layouts.visitor')

@section('content')
<div class="container">
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
                        <h4 class="pull-left"><strong>{{ $product->price / 100 }} €</strong></h4>
                        <form action="/add/cart" method="post" class="pull-right">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@stop
