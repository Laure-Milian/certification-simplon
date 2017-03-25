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

  <!-- HEADER -->

  <!-- Nom du site -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-3">
        <h2 class="site">Le trésor des loutres pirates</h2>
      </div>

      <!-- Barre de recherche + choix catégories  -->

      <div class="col-6">
        <div class="navbar">
         <form class="navbar-form" role="search">
           <ul class="nav navbar-nav">
             <li class="dropdown">
               <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Catégories</button>
               <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="#ballerines">Ballerines</a></li>
                 <li><a class="dropdown-item" href="#escarpins">Escarpins</a></li>
                 <li><a class="dropdown-item" href="#bottes">Bottes</a></li>
                 <li><a class="dropdown-item" href="#baskets">Baskets</a></li>
               </ul>
             </li>
           </ul>
           <div class="input-group">
             <label for="input"></label>
             <input id="input" type="text" class="form-control" placeholder="Trouver un produit">
             <div class="input-group-btn">
               <button class="btn btn-secondary" type="submit">Chercher</button>
             </div>
           </div>
         </form>
       </div>
      </div>

      <!-- Mon espace + s'inscrire -->

       <div class="col-3">
        <div class="loginPart">
          <form class="form-inline pull-xs-right signUp">
            <input id="email" type="email" class="form-control" name="email" value="" placeholder="Mail"> 
            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Mot de passe">
            <a class="btn btn-primary" href="#"><i class="fa fa-sign-in fa-lg fa-fw"></i>Login</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <!-- FIN HEADER -->

  <!-- BLOC 1 : grosse image à gauche 2 images à droite -->
  <div class="container-fluid">
    <div class="row bloc1">
      <div class="gallery_product col col-md-8 filter hdpe">
        <img src="images/escarpins.jpg" class="img-responsive">
      </div>
      <div class="column col-6 col-md-4 filter hdpe">
        <div class="gallery_product">
          <img src="images/baskets.jpg" class="img-responsive">
          <img src="images/bottines.jpg" class="img-responsive">
        </div>
      </div>
    </div>
  </div>

  <!-- BLOC 2 : 3 images  -->
  <div class="container">
    <div class="row bloc2">
      <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="gallery-title">Notre sélection</h1>
      </div>

      <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
        <img src="images/escarpins.jpg" class="img-responsive">
      </div>

      <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
        <img src="images/baskets.jpg" class="img-responsive">
      </div>

      <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
        <img src="images/bottines.jpg" class="img-responsive">
      </div>
    </div>
  </div>

<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>