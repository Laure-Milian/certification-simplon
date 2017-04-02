@extends('layouts.visitor')

@section('content')

<div class="container">
    <div class="card product-details">
        <div class="row">
            <div class="image-wrapper col-sm-5 ">

                <img class="product-image img-responsive" src="http://placekitten.com/g/400/400" />

            </div>
            <div class="details col-sm-7">

                <h2 class="product-title"> {{ $product->name }} </h2>
                <h3 class="product-category"><a href="/category/{{$product->category_id}}"> {{ $category->name }} </a></h3>
                <p class="product-description"> {{ $product->description }} </p>
                <h4 class="price"><strong> Prix : <span> {{ $product->price / 100 }} </span>€</strong></h4>
                <div class="product-stock">
                    @if ($product->stock === 0)
                        <span class="text-danger">Indisponible</span>
                    @elseif ($product->stock < 10)
                        <span class="text-warning">Plus que {{$product->stock}} article(s) disponible(s)</span>
                    @else
                        <span class="text-success">En Stock</span>
                    @endif
                </div>
                <div class="add-to-cart">
                  <form action="/add/cart" method="post">
                      <!-- Ajouts pour cart ici -->
                      {{csrf_field()}}
                      <input type="hidden" name="name" value="{{$product->name}}">
                      <input type="hidden" name="price" value="{{$product->price}}">
                      <!-- Fin ajouts pour cart -->
                      <input type="hidden" name="product_id" value="{{$product->id}}">
                      <div class="form-group">
                          <label for="quantity">Quantité : </label>
                          <input type="number" class="quantity" name="quantity" value="1" min="0" max="20">
                      </div>
                      <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Ajouter au panier</button>
                  </form>
              </div>

            </div>
        </div>
    </div>
</div>

@stop
