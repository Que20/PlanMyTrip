<?php
	session_start();
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
	
	//Contrôle de la présence du champ mail et requête
	
	if($_POST['mail'] != ""){
		$bmail = true;
		$requete = $bdd->prepare('UPDATE user SET Mail = ? WHERE Id_User = ?');
		$requete->execute(array($_POST['mail'], $_SESSION['id']));
		$bdd->closeCursor();
	}
	else
		$bmail = false;
	
	//Contrôle de la présence du champ name et requête
	
	if($_POST['realname'] != ""){
		$bname = true;
		$requete = $bdd->prepare('UPDATE user SET Fullname = ? WHERE Id_User = ?');
		$requete->execute(array($_POST['realname'], $_SESSION['id']));
		$bdd->closeCursor();
	}
	else
		$bname = false;
	
	//Message et redirection
	
	if($bname || $bmail){
		?>
		<div id='login_status'>
            Vos modifications ont bien été enregistrées ! Redirection...
        </div>
        <script type='text/javascript'>
            setTimeout('window.location.replace("index.php")',3000);
        </script>
		<?php
	else{
		?>
		<div id='login_status'>
           Les champs sont vides ! Redirection...
        </div>
        <script type='text/javascript'>
            setTimeout('window.location.replace("index.php")',3000);
        </script>
		<?php
	}
?>