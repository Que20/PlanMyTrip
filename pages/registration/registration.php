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
	
	//Contrôle de la taille du mot de passe
	
	if( strlen($_POST['mdp']) < 8 ){
		header("location:index.php?mdp=-1");
	}
	
	//Génération de la validateKey
	
	$validate_key =  md5(microtime(TRUE)*100000);
		
	//Cryptage du mot de passe 
	
	$mdp = sha1('sx57b&@'.$_POST['mdp']);
	
	
	//Requête de mise en base
	$request = $bdd->prepare('INSERT INTO User(FullName, Pseudo, Mail, Password, ValidateKey, IsValidate) VALUES(?,?,?,?,?,?)');
	$request->execute(array($_POST['realname'], $_POST['pseudo'], $_POST['mail'], $mdp, $validate_key, 0));
	
?>