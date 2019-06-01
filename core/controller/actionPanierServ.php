<?php
require_once("core/model/repository.php");
// require_once($_SERVER["DOCUMENT_ROOT"]."/projet-web/core/model/repository.php");
// require_once(__DIR__."\\model\\repository.php");

session_start();

// $sessionPanier = null;
// if (!empty($_SESSION['panier'])) {
//     $sessionPanier = $_SESSION['panier'];
// }
// $prodPanier = "";

function getSessionPanier(){
    if (!empty($_SESSION['panier'])) {
        return $_SESSION['panier'];
    }
    return null;
}

function setSessionPanier($idProd){
    if(empty($_SESSION["panier"][$idProd])){
        $_SESSION["panier"][$idProd] = 1;
    }else{
        $_SESSION["panier"][$idProd] = $_SESSION["panier"][$idProd] + 1;
    }
}


function addPanier($idProd){

    setSessionPanier($idProd);

    // return listPanier();
}

function delPanier($idProd){

    unset($_SESSION["panier"][$idProd]);

}


function savePanier(){
    $varPanier = getSessionPanier();
    $montantCom = 0;

    if($varPanier == null){
        // echo "c'est ici la methode savePanier()";
        header("location:panier.php");
        exit();
    }else{
        $dateCom = new Datetime();
            
        //Création de la variable tableau commande
        $commande = array(
            ":date" => $dateCom->format('Y-m-j'),
            ":status" => "En attente",
            ":montant" => 0,
            ":active" => 1,
            ":id_compte" => $_SESSION["userId"]
        );

        //Sauvegarder le panier
        $commande = commandeSave($commande);

        
        
        //Sauvegarder les produits du panier
        $produits = produitSelectByPanier(array_keys($varPanier));

        foreach ($produits as $produit) {
            $montantCom += $varPanier[$produit["id_produit"]] * $produit["prix"];

            //création de la variable tableau de la ligne de commande
            $pCom = array(
                ":quantite" => $varPanier[$produit["id_produit"]],
                ":id_produit" => $produit["id_produit"],
                // ":id_commande" => $commande["id_commande"]
                ":id_commande" => $commande
            );
            produitCommandeSave($pCom);
        }
        $commande = commandeSelectById($commande);

            // 

        $commande[0]["montant"] = $montantCom;
        //Mise à jour du montant de la commande
        commandeUpdate($commande[0]);

        // var_dump($commande[0]);  
        // exit();

        //supprimer la variable de session panier
        unset($_SESSION["panier"]);

        //redirection vers Index
        header("location:index.php");
    }
}


//Si un utilisateur est en session
if (!empty($_SESSION['userId'])) {    

    $compte = compteSelectById($_SESSION['userId']); //On charge l'utilisateur a partir de l'id    

    if($compte[0]["type_droit"] == "user"){

        if ($_GET["action"] == "add") {

            addPanier($_GET["idProd"]);

            header('location:panier.php'); //On le redirige sur la page panier
            exit();

           
        }elseif ($_GET["action"] == "del"){
            // delPanier($_GET["idProd"], $_GET["qte"]);
            delPanier($_GET["idProd"]);

            header('location:panier.php'); //On le redirige sur la page panier
            exit();
        }elseif ($_GET["action"] == "save"){
            savePanier();
            // $test = new Datetime();
            // echo $test->format('Y-m-j');

            // header('location:index.php'); //On le redirige sur la page de commande de l'utilisateur
            // exit();
        }else{
            // echo "c'est ici, action non reconue";

            header('location:404.php'); //On le redirige sur la page 404
            exit();
        }
    
    }else{ //Si l'utilisateur en session n'est pas du type user ?
        header('location:index.php'); //On le redirige sur la page admin
        exit();
    }
}else{ // Sinon
    header('location:login.php?idProd='.$_GET["idProd"]);//On le redirige sur la page de connexion avec des paramètre particulier
    exit();
}
