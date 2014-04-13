<?php
	session_start();
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		mysql_set_charset('utf8');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	
	//Vérification du MDP
	
	$entry_mdp = sha1('sx57b&@'.htmlentities($_POST['supprmdp'],ENT_QUOTES));
	
	$requete = $bdd->prepare('SELECT Password FROM user WHERE Id_User = ?');
	$requete->execute(array($_SESSION['id']));
	
	$mdp = $requete->fetch();
	$requete->closeCursor();
	
	if($mdp['Password'] == $entry_mdp){
		$requete = $bdd->prepare('DELETE FROM User WHERE Id_User = ?');
		$requete->execute(array($_SESSION['id']));
		$requete->closeCursor();
		
		session_destroy();
		header("refresh : 1");
	}
	
	else{
		echo('nope');
	}
?>
		