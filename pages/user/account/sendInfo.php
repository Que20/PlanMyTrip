<?php
	session_start();
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		mysql_set_charset('utf8');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}

	$requete = $bdd->prepare("SELECT * FROM user WHERE id_User LIKE ? ;");
    $requete->execute(array('%'.mysql_real_escape_string($_SESSION['id']).'%'));
	while($user = $requete->fetch()){
		$oldmdp = sha1('sx57b&@'.htmlentities($_POST['old'],ENT_QUOTES));
		if($oldmdp == $user['Password']){
			if($_POST['conf'] == $_POST['new']){
			echo "1";
			}else{
				echo "0";
			}
		}else{
			echo "0";
		}
		
	}
?>