<?php
session_start();

// session_destroy();
unset($_SESSION['userId']);
unset($_SESSION['panier']);
// header("location:login.php");
header("location:index.php");
