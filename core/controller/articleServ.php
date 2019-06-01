<?php
require_once("core/model/repository.php");

session_start();

$reqProdH = produitSelectByCategorie("Homme");

$reqProdF = produitSelectByCategorie("Femme");
