@extends('layouts.visitor')

@section('content')

<!-- AJOUT POUR AFFICHAGE MESSAGE APRES SUPPRESSION DE COMPTE -->
  @if (session('message'))
  <div class="alert alert-success" role="alert">{{session('message')}}</div>
  @endif
<!-- FIN AJOUT POUR AFFICHAGE MESSAGE APRES SUPPRESSION DE COMPTE -->

  <!-- ***BLOC PHOTOS 1*** -->

  <div class="contaicturesiner-fluid">
    <div class="row bloc1 col-12">
      <div class="col-md-8">
        <div class="product-item">
          <a href="#"><img src="images/escarpins1.jpg" class="img-responsive"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="product-item">
          <div class="column">
            <div class="item img">
              <a href="#"><img src="images/baskets1.jpg" class="img-responsive"></a>
            </div>
            <div class="item">
              <a href="#"><img src="images/bottines1.jpg" class="img-responsive"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***FIN BLOC PHOTOS 1*** -->

  <!-- ***BLOC PHOTOS 2*** -->

  <!-- LIGNE 1 -->
  <div class="container-fluid">
    <div class="row bloc2">
      <div class="gallery col-12">
        <h1 class="gallery-title">Notre sélection</h1>
      </div>
      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="images/escarpins1.jpg" class="img-responsive"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="images/baskets1.jpg" class="img-responsive"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="images/bottines1.jpg" class="img-responsive"></a>
        </div>
      </div>
    </div>
  </div>

  <!-- LIGNE 2 -->
  <div class="container-fluid">
    <div class="row bloc2">
      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="images/bottines1.jpg" class="img-responsive"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="images/escarpins1.jpg" class="img-responsive"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="images/baskets1.jpg" class="img-responsive"></a>
        </div>
      </div>
    </div>
  </div>

  <!-- LIGNE 3 -->
  <div class="container-fluid">
    <div class="row bloc2">
      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="images/baskets1.jpg" class="img-responsive"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="images/bottines1.jpg" class="img-responsive"></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="images/escarpins1.jpg" class="img-responsive"></a>
        </div>
      </div>
    </div>
  </div>

  <!-- ***FIN BLOC PHOTOS 2*** -->
@stop
