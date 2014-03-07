<?php
session_start();
include('../topbar.php');
//$_POST['pays'] != "" || $_POST['ville'] != "" || $_POST['duration'] != "" || $_POST['contenu'] != ""
$pays = $_POST['pays'];
$titre = $_POST['titre'];
$ville = $_POST['ville'];
$duration = $_POST['duration'];
$contenu = $_POST["input"];
if ($pays == "" || $ville == "" || $duration == "" || $contenu == "") {
	header('location:index.php?error=1');
}
else{
	$date = date("d-m-Y");
	$heure = date("H:i:s");
	$stamp = $date." ".$heure
?>
<div style="padding-top:100px"></div>
<div id="sendGuide">
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
	$request = $bdd->prepare('INSERT INTO guide(Titre, Contenu, Id_User, Pays, Ville, Datetime, duration) VALUES(?,?,?,?,?,?,?)');
	$request->execute(array($titre, $contenu, $_SESSION['id'], $pays, $ville, NULL, $duration));
    $request->closeCursor();

    $requestGetId = $bdd->prepare('SELECT Id_Guide FROM guide WHERE Titre = (?) AND Id_User = ? AND Contenu = ?');
    $requestGetId->execute(array($titre,$_SESSION['id'],$contenu));
    $getIdGuide = $requestGetId->fetch();
    $getIdGuide2 = $getIdGuide['Id_Guide'];
    echo($getIdGuide2);
    $requestGetId->closeCursor();

    $requestVote = $bdd->prepare('INSERT INTO votes(idGuide, nbDown, nbUp) VALUES (?,?,?)');
    $requestVote->execute(array($getIdGuide2,0,0));
    $requestVote->closeCursor();
	?>
	<br>Merci de votre participation !<br>
	Votre guide sera en ligne apres modération (&lsaquo; 48 heures).<br><br>
</div><br><br><br>
<?php
}
?>

<?php include("../footer.php"); ?>
