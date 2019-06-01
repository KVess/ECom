<?php
require_once("core/model/repository.php");

session_start();

//On vérifie que l'utilisateur est connecté
if (empty($_SESSION['userId'] )) { 
  header("location:login.php?info=2");
  exit();
}else{
  if(empty($_GET["id"])){//Si l'id_commande n'est pas passé, on redirige vers l'index
    header("location:index.php");
    exit();
  }else{
    $userId = $_SESSION["userId"];
    $idCommande = $_GET["id"];

    //On charge la commande dans la variable $commande
    $commande = commandeSelectById($idCommande)[0];
    // echo "La variable de session ";
    // var_dump($userId);

    //On charge l'utilisateur dans la variable $user
    $user = compteSelectById($userId)[0];

    // echo "La variable id_compte de la commande ";
    // var_dump($commande["id_compte"]);
    // exit();

    if ($userId != $commande["id_compte"] && $user["type_droit"] != "admin" ) { // Si l'utilisateur n'est pas propriétaire de la commande on affiche un 404
      header("location:404.php");
      exit();
    }else{
      //charger la liste des produits de la commande
      $produits = produitSelectByCommande($idCommande);

 
    }
  }
}