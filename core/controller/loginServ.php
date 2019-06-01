<?php
require_once("core/model/repository.php");

// On démarre la session
session_start();

//On vérifie que l'utiisateur n'est pas logger, le cas echéant on le redirige sur l'accueil
canStayLog(false);


$erreur = null;
$info = null;

//On vérifie si la variabe info a été passé à l'url
if (!empty($_GET["info"])) {
    $info = $_GET["info"];
}

//On vérifie qu'il y a eu soummision du formulaire
if (isset($_POST['btnConnexion'])) {

    //On vérifie qu'il a bien renseigner les deux champ du formulaire (A gérer coté client)
    if(!empty($_POST['pseudo']) && !empty($_POST['pwd'])){

        //On exécute la fonction pour voir si l'utilisateur existe en base de données
        $res = logon($_POST['pseudo'], $_POST['pwd']);

        
        if(!empty($res)){ //Si un utilisateur est trouvé
            
            //On sauvegarde l'id de l'utilisateur en session
            $_SESSION['userId'] = $res[0]["id_compte"];
            
            if (empty($_GET["idProd"])) { //Si il n'y a pas de variable idProd dans l'url, on redirige vers index
                if($res[0]["type_droit"] != "admin"){
                    header('location:index.php' );
                    exit();
                }else{
                    header('location:alistecom.php' );
                    exit();
                }
            }else{// Sinon on redirige l'utilisateur sur l'écran de détail, la ou il était avant de se connecter
                header('location:detail.php?id='.$_GET['idProd']);
            }
            
            exit();
        }else{
            $erreur = "Login failed";
        }
    } 
    // else {
    //     // $erreur = "Login failed";
    // }
}