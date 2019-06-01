<?php
require_once("core/model/repository.php");

session_start();

$urlPage = explode("/", $_SERVER['PHP_SELF'])[2];
// $urlPage = explode("/", $_SERVER['PHP_SELF'])[1]; Pour la version en ligne

// var_dump($urlPage);
// exit();
$commandeNonTraite = null;
$commandeTraite = null;

if (empty($_SESSION['userId'])) { 
    header("location:login.php?info=2");
}else{
    $userId = $_SESSION["userId"];
    $var = isAdmin($userId);//Cette fonction retourne l'utilisateur et un booléen qui dit si l'utilisateur es Admin ou non

    if($var["bool"]){//
        if($urlPage != "alistecom.php"){
            header("location:alistecom.php");
            exit();
        }

        $commandeTraite = commandeTraiteSelectAll();

        $commandeNonTraite = commandeTraiteSelectAll(false);
        // var_dump($commandeNonTraite);
        // var_dump($commandeTraite);
    }

    if(!$var["bool"]){
        if($urlPage != "listecom.php"){
            header("location:listecom.php");
            exit();
        }

        $commandeTraite = commandeTraiteSelectByCompteId($userId);

        $commandeNonTraite = commandeTraiteSelectByCompteId($userId, false);
    }
}

