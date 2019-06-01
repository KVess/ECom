<?php
require_once("core/model/repository.php");

session_start();


function go404(){
    header("location:404.php");
    exit();
}


//Si un utilisateur est en session
if (!empty($_SESSION['userId'])) {    

    if(!empty($_GET["idComm"])){

        if(!empty($_GET["action"])){
            
            $userId = $_SESSION['userId'];
            $idComm = $_GET["idComm"];
            $action = $_GET["action"];

            $compte = compteSelectById($userId)[0]; //On charge l'utilisateur a partir de l'id  

            $commande = commandeSelectById($idComm)[0]; //On charge l'utilisateur a partir de l'id  

            if($action == "sup"){

                if ($compte["id_compte"] = $commande["id_compte"]) { // Si l'utilisateur n'est pas propriétaire de la commande on affiche un 404
                    $commande["active"] = 0;
                }else{
                    go404();
                }
            }

            if($action == "val"){
                if (!empty($commande["id_compte"])) { // Si l'id de la commande a retourné un commande null on affiche un 404
                    $commande["status"] = "Validée";
                }else{
                    go404();
                }
            }

            if($action == "rej"){
                if (!empty($commande["id_compte"])) { // Si l'id de la commande a retourné un commande null on affiche un 404
                    $commande["status"] = "Rejetée";
                }else{
                    go404();
                }
            }

            commandeUpdate($commande);

            header("location:listecom.php");
            exit();
            

        }else{
            go404();
        }

    }else{
        go404();
    }

}else{ // Sinon
    header('location:login.php?action=2');//On le redirige sur la page de connexion avec des paramètre particulier
    exit();
}
