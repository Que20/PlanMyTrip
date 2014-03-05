<?php
	include('../topbar.php');
	
	//Contrôle général sur la présence de tous les champs
	
	if($_POST['oldmdp'] !="" && $_POST['newmdp'] !="" && $_POST['confnewmdp'] !=""){
		
		
		//Contrôle de la concordance du nouveau mdp et de la vérification
		if($_POST['newmdp'] != $_POST['confnewmdp']){
			?>
			<div id='login_status'>
				Les mots de passes entrés ne concordent pas ! Redirection...
			</div>
			<script type='text/javascript'>
				setTimeout('window.location.replace("index.php")',3000);
			</script>
			<?php
		}
		
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
		
		//Comparaison du mot du mot de passe en BDD et ancien mdp entré
		
		$requete = $bdd->prepare('SELECT Password FROM user WHERE Id_User = ?');
		$requete->execute(array($_SESSION['id']));
		
		$db_mdp = $requete->fetch();
		$bdd->closeCursor();
		
		$oldmdp_field = sha1('sx57b&@'.htmlentities($_POST['oldmdp'], ENT_QUOTES));
		
		if($db_mdp != $oldmdp_field){
			?>
			<div id='login_status'>
				Vous avez entré le mauvais mot de passe ! 
			</div>
			<script type='text/javascript'>
				setTimeout('window.location.replace("index.php")',3000);
			</script>
			<?php
			
		}
		else{
		
			$requete = $bdd->prepare('UPDATE user SET Password = ? WHERE Id_User = ?');
			$requete->execute(array(sha1('sx57b&@'.htmlentities($_POST['newmdp'], ENT_QUOTES)), $_SESSION['id']));
			$bdd->closeCursor();
			?>
			<div id='login_status'>
				Votre mot de passe a été changé avec succès ! Redirection...
			</div>
			<script type='text/javascript'>
				setTimeout('window.location.replace("index.php")',3000);
			</script>
			<?php
		}
	else{
		?>
			<div id='login_status'>
				Vous n'avez pas rempli tous les champs ! Redirection...
			</div>
			<script type='text/javascript'>
				setTimeout('window.location.replace("index.php")',3000);
			</script>
			<?php
	}
?>
			