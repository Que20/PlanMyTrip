<?php
include('../topbar.php');
//$_POST['pays'] != "" || $_POST['ville'] != "" || $_POST['duration'] != "" || $_POST['contenu'] != ""
$pays = $_POST['pays'];
$ville = $_POST['ville'];
$duration = $_POST['duration'];
$contenu = $_POST["input"];
if ($pays == "" || $ville == "" || $duration == "" || $contenu == "") {
	header('location:index.php?error=1');
}
else{
?>
<div style="padding-top:100px"></div>
<div id="sendGuide">
	<br>Merci de votre participation !<br>
	Votre guide sera en ligne apres modération (&lsaquo; 48 heures).<br><br>
</div>
<?php
}
?>

<?php include("../footer.php"); ?>