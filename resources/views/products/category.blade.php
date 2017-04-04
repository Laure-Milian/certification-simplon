@extends('layouts.visitor')

@section('content')
<div class="container">

    <!-- AJOUT POUR AFFICHAGE MESSAGE APRES AJOUT AU PANIER -->
    @if (session('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>
    @endif
    <!-- FIN AJOUT POUR AFFICHAGE MESSAGE APRES AJOUT AU PANIER -->

    <h2><strong> {{ $category->name }} </strong></h2>
    <div class="category-description"> {{ $category->description }} </div>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 col-xs-12 product-card">
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
                                <!-- Ajouts pour cart ici -->
                                {{csrf_field()}}
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="price" value="{{$product->price}}">
                                <!-- Fin ajouts pour cart -->
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
          <div class="col-md-4 col-xs-12">
            <p>Aucun produit trouvé.</p>
          </div>
        @endif
    </div>
</div>

@stop
