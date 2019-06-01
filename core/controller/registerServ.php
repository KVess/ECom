<?php

require_once("core/model/repository.php");

canStayLog(false);

$erreur = null;

if (!empty($_POST["add_record"])) {
    if ($_POST["password"] == $_POST["verif_pass"]) {
        $compte = array(
            ":username" => $_POST["username"],
            ":password" => $_POST["password"],
            ":type_droit" => "user",
            ":active" => 1
        );

        $result = compteSave($compte);

        if (!empty($result)) {
            // $succes = 1;
            header('location:login.php?info=1');
        }
    }else{
        $erreur = "La vérification du mot de passe à échoué";
    }
}
