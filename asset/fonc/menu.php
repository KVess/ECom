<?php 
  require_once("core/model/repository.php");

  // session_start();
?>


<!-- <!DOCTYPE html>
<html lang="fr">
<head> -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- <title>Document</title> -->
  <!-- <link rel="stylesheet" href="asset/css/bootstrap.css"> -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/style.css">

</head>
<body>
  

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Style Fresh</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ah.php">Article Homme</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="af.php">Article Femme</a>
      </li>
      
    
      <li class="nav-item dropdown ">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profil
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php 
          if (empty($_SESSION['userId'])) { 
          ?>
            <a class="dropdown-item" href="login.php">Connexion</a>
          <?php 
          }else{
            $userId = $_SESSION["userId"];
            $var = isAdmin($userId);//Cette fonction retourne l'utilisateur et un booléen qui dit si l'utilisateur es Admin ou non
        
            if(!$var["bool"]){//
            ?>
              <a class="dropdown-item" href="listecom.php">Mes commandes</a>
            <?php 
            }else{
            ?>
              <a class="dropdown-item" href="alistecom.php">Commandes</a>
          <?php
            }
          ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Deconnexion</a>
        <?php
          }
        ?>

        </div>
      </li>
    </ul>
    <span style="margin-right:20px">
      <?php 
        if (!empty($var)) {
          echo "Bienvenue <b>".$var["compte"]["username"]."</b>" ;
        }
      ?>
    </span>
    <a href="panier.php">
      <button type="button" class="btn btn- panier">
        Panier 
        
        <span class="badge badge-light">
        <?php 
          if (!empty($_SESSION['panier'])) {
            echo count($_SESSION['panier']);
          }else{
            echo 0;
          }
        ?>
        </span>
        <!-- <span class="sr-only">unread messages</span> -->
      </button>
    </a>

  </div>
</nav>

<!-- </body>
</html> -->