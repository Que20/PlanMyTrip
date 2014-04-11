<?php
	include('../topbar.php');
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
	
	//Contrôle de la taille du mot de passe
	
	if( strlen($_POST['mdp']) < 8 ){
		header("location:index.php?error=1");
	}

	if( strlen($_POST['mdp']) != strlen($_POST['mdp2']) ){
		header("location:index.php?error=2");
	}


	
	//Génération de la validateKey
	
	$validate_key =  md5(microtime(TRUE)*100000);
		
	//Cryptage du mot de passe 
	
	$mdp = sha1('sx57b&@'.htmlentities($_POST['mdp'],ENT_QUOTES));
	
	
	//Requête de mise en base
	$request = $bdd->prepare('INSERT INTO User(FullName, Pseudo, Mail, Password, ValidateKey, IsValidate) VALUES(?,?,?,?,?,?)');
	$request->execute(array(htmlentities($_POST['realname'],ENT_QUOTES), htmlentities($_POST['pseudo'],ENT_QUOTES), htmlentities($_POST['mail'],ENT_QUOTES), $mdp, $validate_key, 1));
	
	//Envoi du mail de confirmation
	
	$message = "Bonjour, et merci pour votre inscription sur notre site ! \r\n
				Veuillez suivre ce lien pour activer votre compte : \r\n http://planmytrip.com/pages/registration/confirmation.php?".$validate_key."\r\n \n
				L'équipe PlanMyTrip. \r\n \n
				P.S. : ceci est un mail automatique, veuillez ne pas y répondre.";
	
	if(mail($_POST['mail'], "Confirmation d'inscription", $message)){
		?>
		<span style="width:600px;text-align:center;padding-top:200px;margin:auto;">Merci de votre inscription !<br>Un mail de confirmation a été envoyé à l'adresse mail indiqué.<br>À tout de suite sur PlanMyTrip :)</span>
		<?php
	}
	else{
		header("location:index.php?error=3");
	}
				
	
?>
<?php include("../footer.php"); ?>