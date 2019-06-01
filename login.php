<?php 
  require_once("core/controller/loginServ.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>style fresh</title>
    <link  href="asset\css\style.css" rel="stylesheet" type="text/css" >
    <link  href="asset\css\bootstrap.css" rel="stylesheet" type="text/css" >

</head>
<body>
<br>

<?php if($erreur): ?>

    <div class="alert alert-danger text-center">
        <?= $erreur; ?>
    </div>

<?php endif ?>

<?php if ($info == 1): ?>
    
    <div class="alert alert-info text-center">
        <p>Inscription réussi insérer vos information de connexions pour vous connecter</p>
    </div>

<?php  endif  ?>

<?php if ($info == 2): ?>
    
    <div class="alert alert-info text-center">
        <p>Connectez vous pour avoir accès a vos commande</p>
    </div>

<?php  endif  ?>

<div class="wrapper fadeInDown">

  <div id="formContent">
    
    <div class="container titles">
      <h1>Connexion </h1>
    </div>

    <form action="" method="post">

      <input type="text" name="pseudo" id="pseudo" class="fadeIn second" placeholder="Mon d'utilisateur">

      <input type="text" name="pwd" id="pwd" class="fadeIn third" placeholder="Mot de passe">

      <input type="submit" name="btnConnexion" class="fadeIn fourth" value="Valider">

    </form>

    
    <div id="formF">
      <a class="underlineHover" href="inscription.php">S'inscrire</a>
    </div>

  </div>
</div>
</body>
</html>