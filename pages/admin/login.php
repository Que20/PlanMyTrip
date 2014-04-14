<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '');
		
		$bdd->query("SET NAMES utf8");
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	
	$requete=$bdd->prepare('SELECT * FROM admin WHERE Pseudo = ? AND Password = ?');
	$requete->execute(array($_POST['id_admin'], $_POST['mdp_admin']));
	
	$result = $requete->fetch();
	$requete->closeCursor();
	
	if(!$result){
		?>
		<h1>Accès refusé</h1>
		<h3>Mauvais identifiants</h3>
		<script type='text/javascript'>
					setTimeout('window.location.replace("index.php")',3000);
		</script>
		<?php
	}
	else{
		header('Location:admin_panel.php');
	}
?>

		