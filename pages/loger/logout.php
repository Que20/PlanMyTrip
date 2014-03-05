<?php
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 05/03/14
 * Time: 14:14
 */
// Suppression des variables de session et de la session
session_start();
$_SESSION = array();
// On détruit les variables de notre session
session_unset();
//On détruit la session
session_destroy();
echo "Vous êtes désormais deconnecté";
//Deco et redirection vers l'index

header('location:../../index.php');