<?php
header('Content-Type: text/html; charset=utf-8');
if(isset($_POST['data'])){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		mysql_set_charset('utf8');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	$requete = $bdd->prepare("SELECT Ville FROM guide WHERE Ville LIKE ? ;");
        $requete->execute(array('%'.mysql_real_escape_string($_POST['data']).'%'));
	$data = array();
	$i = 0;
	while(($city = $requete->fetch()) && $i < 3){
		$data[$i] = (string)$city['Ville'];
		$i++;
	}
}else{
	$data = [ ];
}
echo json_encode($data);
?> 