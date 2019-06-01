<?php

require_once("core/database/Condb.php");
// require_once($_SERVER["DOCUMENT_ROOT"]."/projet-web/core/database/Condb.php");


//Mes outils (Les fonctions)
//**************************
function canStayLog($bool){
    if (empty($_SESSION['userId']) == $bool) {
        header('location:index.php');
        exit();
    }
}

function isAdmin($idCompte){
    $res = array();
    $res["compte"] = compteSelectById($idCompte)[0];
    if($res["compte"]["type_droit"] == "admin"){
        $res["bool"] = true;
    }else{
        $res["bool"] = false;
    }

    return $res;
}




//Les fonctions sources des requêtes
//**********************************


function racineSql($req, $tablePar = ""){
    global $bdd;
    $res = $bdd->prepare($req);
    if ($tablePar == "") {
       // $res->execute();
        return $res;
    } else {
        return $res->execute($tablePar);
    }
    
}

//Cette fonction permet de préparer la requête passer en paramètre et de la retourner sous forme de tableau
function baseSql($req){
    // global $bdd;
    // $res = $bdd->prepare($req);
    $res = racineSql($req);
    $res->execute();

    return $res->fetchAll();
}

// ************************************************************
// TOUTES LES FONCTIONS SUIVANTE EXECUTE DES REQUETES PREDEFINI
// ************************************************************ 


// Les requêtes sur la table compte
// *********************************

function logon($username, $password){
    // global $bdd;
    // $req = $bdd->prepare("SELECT * FROM compte WHERE username = '".$username."' AND password = '".$password."';");
    // $req->execute();
    $req = "SELECT * FROM compte WHERE username = '".$username."' AND password = '".$password."';";

    return baseSql($req);
}

function compteSelectById($id_compte){
    $req = "SELECT * FROM compte WHERE id_compte = '".$id_compte."';";

    return baseSql($req);
}

//* $compte est un tableau
function compteSave($compte){
    $sql = "INSERT INTO compte   ( username, password, type_droit, active) VALUES ( :username, :password, :type_droit, :active)";

    // echo "Le parametre de la fonction compteSave ";
    // var_dump($compte);

    return racineSql($sql, $compte);
}


// Les requêtes sur la table produit
// *********************************


function produitSelectAll(){
    $req = "SELECT * FROM produit;";
    return baseSql($req);
}

function produitSelectById($idProduit){
    $req = "SELECT * FROM produit WHERE id_produit=".$idProduit.";";
    return baseSql($req);
}

function produitSelectByPanier($idTab){
    $req = "SELECT * FROM produit WHERE id_produit IN (".implode(",", $idTab).")";
    return baseSql($req);
}

function produitSelectByCategorie($categorie){
    $req = "SELECT * FROM produit WHERE categorie = ('".$categorie."') AND active = 1";
    return baseSql($req);
}

function produitSelectByCommandeBis($idCommande){
    $req = "SELECT * FROM produit WHERE id_produit IN ( SELECT id_produit FROM produit_commande WHERE id_commande = " . $idCommande . ")";
    return baseSql($req);
}

function produitSelectByCommande($idCommande){
    $req = "SELECT * FROM produit_commande WHERE id_commande = " . $idCommande . ";";
    $prodComs = baseSql($req); //$prodComs est une liste de produit_commande

    $res = null;
    if(!empty($prodComs)){
        $res = array();

        //On ajoute une nouvelle propriété au produit_commande qui va contenir toute l'information du produit correspondant
        foreach ($prodComs as $prodCom) {
            $prodCom["produit"] = produitSelectById($prodCom["id_produit"])[0];
            array_push($res, $prodCom);
        }
    }
    //Ainsi on a les produit est leur quantité dans la variable $res
    return $res;
}

function produitSave($produit){
    $sql = "INSERT INTO produit ( designation, description, categorie, prix, stock, active) VALUES ( :designation, :description, :categorie, :prix, :stock, :active)";
    // $req = $bdd->prepare($sql);

    // return $req->execute(array(':date' => date("d-m-Y"), ':status' => $status, ':active' => true, ':id_compte' => $idCompte));
    //$par = array(':date' => date("d-m-Y"), ':status' => $status, ':active' => true, ':id_compte' => $idCompte);

    return racineSql($sql, $produit);
}


// Les requêtes sur la table commande
// **********************************


function commandeSelectAll(){
    $req = "SELECT * FROM commande WHERE active = true;";
    return baseSql($req);
}

function commandeTraiteSelectByCompteId($idCompte, $isTraite = true){
    if ($isTraite) {
        $req =  "SELECT * FROM commande WHERE id_compte = " . $idCompte . " AND status != 'En attente' AND active = 1;"; 
    }else{
        $req =  "SELECT * FROM commande WHERE id_compte = " . $idCompte . " AND status = 'En attente' AND active = 1;"; 
    }
    
    return baseSql($req);
}

function commandeTraiteSelectAll($isTraite = true){
    if ($isTraite) {
        $req =  "SELECT * FROM commande WHERE status != 'En attente' AND active = 1;"; 
    }else{
        $req =  "SELECT * FROM commande WHERE status = 'En attente' AND active = 1;"; 
    }
    
    return baseSql($req);
}

function commandeSelectById($idCommande){
    $req = "SELECT * FROM commande WHERE id_commande = " . $idCommande . ";";
    return baseSql($req);
}



function commandeSave($commande){
    $sql = "INSERT INTO commande ( date, status, active, montant, id_compte ) VALUES ( :date, :status, :active, :montant, :id_compte )";


    // $req = $bdd->prepare($sql);

    // return $req->execute(array(':date' => date("d-m-Y"), ':status' => $status, ':active' => true, ':id_compte' => $idCompte));
    //$par = array(':date' => date("d-m-Y"), ':status' => $status, ':active' => true, ':id_compte' => $idCompte);
    
    if (racineSql($sql, $commande)) {
        $res = baseSql("SELECT LAST_INSERT_ID()");
        return $res[0][0];
    }else{
        return 0;
    }

}

// function commandeUpdate($id, $date, $status, $active, $idCompte){
//     $sql = "update commande set date='" . $date . "', status='" . $status . "', active=" . $active . ", id_compte=" . $idCompte . " where id=" . $id;
//     // $req = $bdd->prepare($sql);

//     // return $req->execute();
//     return racineSql($sql)->execute();
// }

function commandeUpdate($commande){
    $sql = "update commande set date='" . $commande['date'] . "', status='" . $commande['status'] . "', montant=". $commande['montant'] .", active=" . $commande['active'] . " where id_commande=" . $commande['id_commande'];
    // var_dump($sql);
    // $req = $bdd->prepare($sql);

    // return $req->execute();
    return racineSql($sql)->execute();
}

function produitCommandeSave($pCom){
    $sql = "INSERT INTO produit_commande ( quantite, id_produit, id_commande ) VALUES (:quantite, :id_produit, :id_commande)";

    return racineSql($sql, $pCom);
}

// *******************************
// FIN DES FONCTIONS DES REQUETES 
// *******************************


