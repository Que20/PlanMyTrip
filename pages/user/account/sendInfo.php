<?php
	session_start();
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		mysql_set_charset('utf8');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}

	$requete = $bdd->prepare("SELECT * FROM user WHERE Id_User = ? ;");
    $requete->execute(array(mysql_real_escape_string($_SESSION['id'])));
	while($user = $requete->fetch()){
		$oldmdp = sha1('sx57b&@'.htmlentities($_POST['old'],ENT_QUOTES));
		if($oldmdp == $user['Password']){
			if($_POST['conf'] == $_POST['new']){
				$newmdp = sha1('sx57b&@'.htmlentities($_POST['old'],ENT_QUOTES));
				$insert = $bdd->prepare('UPDATE User SET FullName = ?, Password = ? WHERE Id_User = ?');
				$insert->execute(array(htmlentities($_POST['fullname'],ENT_QUOTES), $newmdp, $_SESSION['id']));
				echo "1";
			}else{
				echo "0";
			}
		}else{
			echo $oldmdp.' vs '. $user['Password'];
		}
		
	}
?>