<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Le Trésor des Loutres Pirates</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap/4.0.0-alpha.6/css/bootstrap.css">
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>

  <!-- ***HEADER*** -->

  <!-- TITRE -->
  <div class="container-fluid">
    <div class="row title col-12">
      <div class="col-md-4 col-xs-4">
        <div class="product-nav">
          <h1 class="site">Le Trésor des Loutres Pirates</h1>
        </div>
      </div>

      <!-- BARRE DE NAVIGATION : CATEGORIES -->
      <div class="col-md-4 col-xs-4">
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
              <input type="submit">
            </form>
         </form>
       </div>
     </div>

    <!-- CONNEXION / INSCRIPTION -->
     <div class="col-md-4 col-xs-4">
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

                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***FIN HEADER*** -->

  @yield('content')


<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>
