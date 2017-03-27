<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Le Trésor des Loutres Pirates</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap/4.0.0-alpha.6/css/bootstrap.css">
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>

  <!-- ***HEADER*** -->

  <!-- TITRE -->
  <div class="container-fluid">
    <div class="row title col-12">
      <div class="col-md-4">
        <div class="product-nav">
          <h2 class="site">Le trésor des loutres pirates</h2>
        </div>
      </div>

      <!-- BARRE DE NAVIGATION : CATEGORIES -->
      <div class="col-md-4">
        <div class="navbar">
         <form class="navbar-form" role="search">
           <ul class="nav navbar-nav">
             <li class="dropdown">
               <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Catégories</button>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#ballerines">Ballerines</a></li>
                 <li><a class="dropdown-item" href="#escarpins">Escarpins</a></li>
                 <li><a class="dropdown-item" href="#bottes">Bottes</a></li>
                 <li><a class="dropdown-item" href="#baskets">Baskets</a></li>
               </ul>
             </li>
           </ul>
            <!-- BARRE DE NAVIGATION : RECHERCHE PAR NOM DE PRODUIT -->
            <form action="search" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label for="input"></label>
              <input id="input" type="text" class="form-control" placeholder="Rechercher un produit">
              <input type="submit" value="Valider">
            </form>
         </form>
       </div>
     </div>
    
    <!-- CONNEXION / INSCRIPTION -->
     <div class="col-md-4">
      <div class="product-nav">
        <div class="loginPart">
          <div class="form-inline pull-xs-right signUp">
              @if (Route::has('login'))
                  <div class="top-right links">
                      @if (Auth::check())
                          <a class="logLink" href="{{ url('/home') }}">Home</a>
                      @else
                          <a class="logLink" href="{{ url('/login') }}">Me connecter</a>
                          <a class="logLink" href="{{ url('/register') }}">M'inscrire</a>
                      @endif
                  </div>
              @endif
                <div class="content">
                    <div class="title m-b-md">
                      {{$products}}
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***FIN HEADER*** -->

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

<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>