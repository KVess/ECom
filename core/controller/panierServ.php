<?php
require_once("core/model/repository.php");

session_start();


$sessionPanier = null;
$total = 0;
$prodPanier = "";

if (!empty($_SESSION['panier'])) {
    $sessionPanier = $_SESSION['panier'];
}

function getSessionPanier(){
    if (!empty($_SESSION['panier'])) {
        return $_SESSION['panier'];
    }
    return null;
}

//Cette fonction permet d'ajouter une produit avec la quantité "1" a la variable de session panier
// function setSessionPanier($idProd){
//     if(empty($_SESSION["panier"][$idProd])){
//         $_SESSION["panier"][$idProd] = 1;
//     }else{
//         $_SESSION["panier"][$idProd] = $_SESSION["panier"][$idProd] + 1;
//     }
// }


//Cette fonction permet de retourner tous les produit enrégistrer dans la session panier
function listPanier(){

    $sessionPanier = getSessionPanier(); //Récupération du tableaux en session

    if($sessionPanier == null){//Si la variable de session Panier est null, on retourne null
        return null;
    }else{
        
        return produitSelectByPanier(array_keys($sessionPanier)); // Recupération des produits a l'aide des id

    }
}

// //Cette fonction ajoute un produit au panier et retourne la liste des produits
// function addPanier($idProd){

//     setSessionPanier($idProd);

//     return listPanier();
// }

// //
// function delpanier($idProd, $qte){
//     global $sessionPanier; //recupération de la variable de session du panier

//     // var_dump($sessionPanier);

//     //rechercher l'index de l'élement a supprimer
//     $index = array_search(array("idProd" => $idProd, "qte" => $qte), $sessionPanier);

//     //Suppression d'un index dans la variable de session panier
//     array_splice($sessionPanier, $index, 1);


//     //Retourner la liste des fichiers
//     return listPanier();

// }


//Si un utilisateur est en session
if (!empty($_SESSION['userId'])) {    
    
    $compte = compteSelectById($_SESSION['userId']); //On charge l'utilisateur a partir de l'id

    
    if($compte[0]["type_droit"] == "user"){ //Si le compte utilisateur est du type utilistateur
        
        $prodPanier = listPanier();

        // if (empty($_GET["action"])) { //Si il n'y a pas de variable "action" dans l'url, on affiche la liste des produits dans le panier
            

        // }elseif ($_GET["action"] == "add") {//Si il y a une variable "action" avec pour valeur add, on ajoute une valeur au panier et on list

        //     $prodPanier = addPanier($_GET["idProd"]);

        // }elseif ($_GET["action"] == "del"){//Si il y a une variable "action" avec pour valeur del, on supprime une valeur au panier et on list

        //     $prodPanier = delpanier($_GET["idProd"], $_GET["qte"]);
        // }
    
    }else{ //Si l'utilisateur en session n'est pas du type user ?
        
        header('location:index.php'); //On le redirige sur la page admin
        exit();
    }
}else{ 
    header('location:login.php');//On le redirige sur la page de connexion 
    exit();
}