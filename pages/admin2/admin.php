<?php
session_start();
if(isset($_SESSION['id_admin']) && isset($_SESSION['pseudo_admin']))
{


if($_POST['data'] == 1){
	$filtre = 1;
}else if($_POST['data'] == 2){
	$filtre = 2;
}else{
	$filtre = 0;
}
?>
<?php
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		mysql_set_charset('utf8');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	if($filtre == 0){
		$requete = $bdd->prepare('SELECT * FROM Guide;');
	}else if($filtre == 1){
		$requete = $bdd->prepare('SELECT * FROM Guide WHERE isValide = 1;');
	}else if($filtre == 2){
		$requete = $bdd->prepare('SELECT * FROM Guide WHERE isValide = 0;');
	}
	$requete->execute();
	$data = array();
	while($guide = $requete->fetch()){
		$sub = array(
			"id" => $guide['Id_Guide'],
	    	"pays" => $guide['Pays'],
	    	"ville" => $guide['Ville'],
	    	"duree" => $guide['duration'],
	    	"nom" => $guide['Titre'],
	    	"date" => $guide['Datetime'],
	    	"etat" => $guide['isValide']
		);
		$data[] = $sub;
	}
	echo json_encode($data);

}
else
{
    header('Location:index.php');
}

?>