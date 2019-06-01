<?php
  session_start();
?>

<html lang="fr">
<head>

    <title>Style Fresh Bienvenue</title>
    

<?php include 'asset/fonc/menu.php'; ?>

<!-- <img src="asset/image/15.jpg" class="card-img image" alt="..."> -->
<img src="asset/image/model-01.jpg" class="card-img image" alt="...">

<div class="card text-center" style="border: 1px solid rgba(255, 255, 255, 0.13) !important;">
 
  <div class="card-body">
    <h5 class="card-title">Style Fresh</h5>
    <h1>Le meilleur des articles pour "VOUS" Inscrivez vous maintenant...</h1>
    <div class="container">

    <!-- Call to action -->
    <ul class="list-unstyled list-inline text-center py-2">
  
    <li class="list-inline-item">
    <a href="inscription.php" class="btn btn- panier">Inscription</a>
     </li>
      </ul>
<!-- Call to action -->

       </div>
  </div>
  <div>
    <div class="row">
      <div class="col-sm-2"> </div>
    <div class="col-sm-8">
      <form class="form-inline  my-2 my-lg-0 rech1">
        <input class="form-control mr-sm-2 rech" style="margin-right: 0px !important" type="search" placeholder="Rechercher un article" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
    
      </form>
    </div>
    <div class="col-sm-2"> </div>

    </div>
    </div>
    
</div>
<div class="container ">
<a href="af.php"><div class="card-deck text-center">
  <div class="card">
    <img src="asset/image/6.jpg" class="card-img-top img1" alt="...">
    <div class="card-body">
    <a href="af.php"><h5 class="card-title">Article Femme</h5></a>
      <div class="dropdown-divider"></div>

      <p class="card-text">Le meilleur des articles pour "VOUS"...</p>
      <p class="card-text"><small class="text-muted">24h/24</small></p>
    </div>
  </div><a href="ah.php">
  
  <div class="card">
    <img src="asset/image/4.jpg" class="card-img-top img1" alt="...">
    <div class="card-body">
    <a href="ah.php"><h5 class="card-title">Article Homme</h5></a>
      <div class="dropdown-divider"></div>

      <p class="card-text">Le meilleur des articles pour "VOUS"...</p>
      <p class="card-text"><small class="text-muted">24h/24</small></p>
    </div>
  </div>
  
</div>
</div>


<?php include 'asset/fonc/footer.php'; ?>

</body>
</html>