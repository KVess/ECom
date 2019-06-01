<?php

    require_once("core/model/repository.php");

    session_start();

    $varIdProduit = $_GET["id"];

    $reqProd = produitSelectById($varIdProduit);
 