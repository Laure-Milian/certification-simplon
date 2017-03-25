<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Affichage des Modules</title>
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

  </div>
</div>


<script type="text/javascript" src="/js/app.js"></script>
</body>
</html>