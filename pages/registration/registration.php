<?php

	//Connexion BDD
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '');
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	
	//Contrôle des champs
	
	
	//Cryptage du mot de passe 
	
	$mdp = sha1('sx57b&@'.$_POST['mdp'];
	
	
	//Requête de mise en base
	$request = $bdd->prepare('INSERT INTO User(FullName, Pseudo, Mail, Password) VALUES(?,?,?,?)');