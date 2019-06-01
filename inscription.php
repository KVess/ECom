<?php
  require_once("core/controller/registerServ.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>style fresh</title>
    <link  href="asset\css\style.css" rel="stylesheet" type="text/css" >

</head>
<body>



<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="Utilisateur" />
    </div>

    <form name="frmAdd" action="" method="POST" class="login">

      <input class="fadeIn second" type="email" name="username" id="username" placeholder="xxxx@yyyy.zzz" required>

      <input class="fadeIn third" type="password" name="password" id="password" placeholder="Mot de passe" required>

      <input class="fadeIn third" type="password" name="verif_pass" id="verif_pass" placeholder="Verification de mot de passe" required>

      <input name="add_record" type="submit" class="fadeIn fourth" value="Valider">
      
    </form>

    
    
  </div>
</div>
</body>
</html>