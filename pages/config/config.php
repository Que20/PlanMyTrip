<?php
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 05/03/14
 * Time: 09:58
 */

//Connexion BDD

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '');

    $bdd->query("SET NAMES utf8");
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}