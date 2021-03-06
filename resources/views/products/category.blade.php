@extends('layouts.visitor')

@section('content')
<div class="container">

    <div class="row">
        <div class="filters col-md-12 col-xs-12">
            <form class="form-inline" action="/filter" method="post">
                <input type="hidden" name="category_id" value="{{$category->id}}">

                <select class="form-control" name="author">
                    <option value="">Auteur</option>
                    @foreach ($authors as $author)
                    <option value="{{ $author->author }}">{{ $author->author }}</option>
                    @endforeach
                </select>
                <select class="form-control" name="released_year">
                    <option value="">Année de Parution</option>
                    @foreach ($released_years as $released_year)
                    <option value="{{ $released_year->released_year }}">{{ $released_year->released_year }}</option>
                    @endforeach
                </select>
                <select class="form-control" name="stock">
                    <option value="">Stocks</option>
                    <option value="">Tous produits</option>
                    <option value="stock"> Seulement produits en stock</option>
                </select>
                {{ csrf_field() }}
                <button type="submit" class="btn" name="button">Filtrer les produits</button>
            </form>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>
    @endif

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
                                {{csrf_field()}}
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="price" value="{{$product->price}}">
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
