<?php
session_start();
include("../../pages/topbar.php");
$g =  $_GET['Id_Guide'];
try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', $pdo_options);
	$bdd->exec("set names utf8");
}catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}
?>
<?php
$requete = $bdd->prepare("SELECT * FROM guide WHERE Id_Guide LIKE ?");
$requete->execute(array($g));
while($item=$requete->fetch()){
	?>
	<div id="guidePage">
		<div id="guideInfos">
			<span id="guideName"><?php echo $item['Titre'] ?></span><br>
			<span id="guideBy">Soumis par l'utilisateur : <?php echo $item['Id_User'] ?> <br> le : xx/xx/xxxx</span>
		</div>
		<div id="pub1"></div>
		<div id="guideText">
			<?php echo $item['Contenu'] ?>
		</div>
		<div id="pub2"></div>

	</div>
	<?php
}
?>
