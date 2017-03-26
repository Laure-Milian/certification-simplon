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

  <div class="container-fluid">
    <div class="row title col-12">
      <div class="col-md-4">
        <div class="product-nav">
          <h2 class="site">Le trésor des loutres pirates</h2>
        </div>
      </div>

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
           <label for="input"></label>
           <input id="input" type="text" class="form-control" placeholder="Trouver un produit">
           <div class="input-group-btn">
             <button class="btn" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
           </div>
         </form>
       </div>
     </div>

     <div class="col-md-4">
      <div class="product-nav">
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
</div>

<div class="container-fluid">
  <div class="row bloc1 col-12">
    <div class="col-md-8">
      <div class="product-item">
        <img src="images/escarpins1.jpg" class="img-responsive">
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-item">
        <div class="column">
          <div class="item img">
            <img src="images/baskets1.jpg" class="img-responsive">
          </div>
          <div class="item">
            <img src="images/bottines1.jpg" class="img-responsive">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row bloc2">
    <div class="gallery col-12">
      <h1 class="gallery-title">Notre sélection</h1>
    </div>
    <div class="col-md-4">
      <div class="product-item">
        <img src="images/escarpins1.jpg" class="img-responsive">
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-item">
        <img src="images/baskets1.jpg" class="img-responsive">
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-item">
        <img src="images/bottines1.jpg" class="img-responsive">
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row bloc2">
    <div class="col-md-4">
      <div class="product-item">
        <img src="images/bottines1.jpg" class="img-responsive">
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-item">
        <img src="images/escarpins1.jpg" class="img-responsive">
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-item">
        <img src="images/baskets1.jpg" class="img-responsive">
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row bloc2">
    <div class="col-md-4">
      <div class="product-item">
        <img src="images/baskets1.jpg" class="img-responsive">
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-item">
        <img src="images/bottines1.jpg" class="img-responsive">
      </div>
    </div>
    <div class="col-md-4">
      <div class="product-item">
        <img src="images/escarpins1.jpg" class="img-responsive">
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>