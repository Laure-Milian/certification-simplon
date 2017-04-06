@extends('layouts.visitor')

@section('content')

<!-- AJOUT POUR AFFICHAGE MESSAGE APRES SUPPRESSION DE COMPTE -->
  @if (session('message'))
  <div class="alert alert-success" role="alert">{{session('message')}}</div>
  @endif
<!-- FIN AJOUT POUR AFFICHAGE MESSAGE APRES SUPPRESSION DE COMPTE -->

  <!-- ***BLOC PHOTOS 1*** -->

  <div class="container-fluid">

    @if (session('success'))
    <div class="alert alert-success" role="alert">{{session('success')}}</div>
    @endif

    <div class="row bloc1 col-12">

      <!-- FAVORITE PRODUCT -->

      <div class="col-md-8 col-sm-12 col-xs-12 product-card card">

          <div class="row">
            <div class="product-details">
              <div class="image-wrapper col-xs-12 col-md-6">

                <img class="product-image img-responsive" src="http://placekitten.com/g/400/400" />

              </div>
              <div class="details col-xs-12 col-md-6">

                <h2 class="product-title"> {{ $sellerFavorite->name }} </h2>
                <p class="product-description"> {{ $sellerFavorite->description }} </p>
                <h4 class="price"><strong> Prix : <span> {{ $sellerFavorite->price / 100 }} </span>€</strong></h4>

                @if ($sellerFavorite->stock > 0)
                <div class="add-to-cart">
                  <form action="/add/cart" method="post">
                    <input type="hidden" name="product_id" value="{{$sellerFavorite->id}}">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="name" value="{{$sellerFavorite->name}}">
                    <input type="hidden" name="price" value="{{$sellerFavorite->price}}">
                    {{ csrf_field() }}
                    <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Ajouter au panier</button>
                  </form>
                </div>
                @endif

              </div>
            </div>

          </div>

      </div>

      <!-- RANDOM PRODUCTS -->

      <div class="col-md-4 col-sm-12 col-xs-12">

        <div class="row">
            @foreach ($randomProducts as $randomProduct)

              <div class="col-12">

                <div class="product-card card">
                  <div class="card-content">
                    <div class=" col-md-6 col-xs-12">
                      <div class="image-wrapper-home">
                        <a href="/{{ $randomProduct->id }}">
                          <img src="{{ $randomProduct->picture }}" class="img-responsive" alt="Photo de {{ $randomProduct->name }}">
                        </a>
                      </div>
                    </div>
                    <div class="caption caption-card col-md-6 col-xs-12">
                      <h3 class="category-product-title home-title"><a href="/{{ $randomProduct->id }}">{{ $randomProduct->name }}</a></h3>

                      <div class="home-product-stock">
                        <h4><strong>{{ $randomProduct->price / 100 }} €</strong></h4>
                        @if ($randomProduct->stock === 0)
                        <div class="text-danger small-danger">Indisponible</div>
                        @else
                        <form action="/add/cart" method="post">
                          <input type="hidden" name="product_id" value="{{$randomProduct->id}}">
                          <input type="hidden" name="quantity" value="1">
                          <input type="hidden" name="name" value="{{$randomProduct->name}}">
                          <input type="hidden" name="price" value="{{$randomProduct->price}}">
                          {{ csrf_field() }}
                          <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                        </form>
                        @endif

                      </div>
                    </div>
                  </div>
                </div>
            </div>

            @endforeach

          </div>

      </div>

    </div>
  </div>

  <!-- 8 LAST PRODUCTS ADDEDs -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 col-xs-12">
        <h2 class=""><i class="fa fa-bomb" aria-hidden="true"></i> Les dernières perles des Loutres Pirates</h2>
      </div>
    </div>

    <div class="row bloc2">
      @foreach ($lastProducts as $lastProduct)
        <div class="col-md-4 col-xs-12 product-card">
            <div class="card card-content">
                <div class="image-wrapper-category">
                    <a href="/{{ $lastProduct->id }}">
                        <img src="{{ $lastProduct->picture }}" class="img-responsive" alt="Photo de {{ $lastProduct->name }}">
                    </a>
                </div>
                <div class="caption caption-card">
                    <h3 class="category-product-title"><a href="/{{ $lastProduct->id }}">{{ $lastProduct->name }}</a></h3>

                    <div class="category-product-stock">
                        <h4 class="pull-left"><strong>{{ $lastProduct->price / 100 }} €</strong></h4>
                        @if ($lastProduct->stock === 0)
                          <div class="text-danger pull-right">Indisponible</div>
                        @else
                          <form action="/add/cart" method="post" class="pull-right">
                            <input type="hidden" name="product_id" value="{{$lastProduct->id}}">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="name" value="{{$lastProduct->name}}">
                            <input type="hidden" name="price" value="{{$lastProduct->price}}">
                            {{ csrf_field() }}
                            <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Ajouter au panier</button>
                          </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
      @endforeach
    </div>
  </div>

@stop
