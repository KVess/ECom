<?php
try {
	// $bdd = new PDO('mysql:host=localhost;dbname=td_comande', 'root', '');
	$bdd = new PDO('mysql:host=localhost;dbname=td_ecom', 'root', '');
	// $bdd = new PDO('mysql:host=localhost;dbname=id8627568_td_ecom', 'id8627568_ves', '123456789');
	// $bdd = new PDO('mysql:host=localhost;dbname=id8627568_td_ecom', '', '');
} catch (Exception $e) {
	die("Erreur : ".$e->getMessage());
}