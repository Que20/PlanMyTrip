<?php
			session_start();
		try{
		$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		mysql_set_charset('utf8');
		}
		catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}
		
		$requete = $bdd->prepare('SELECT Pays, Ville, duration, Titre, Datetime, isValide FROM Guide WHERE Id_User = ?');
		$requete->execute(array($_SESSION['id']));
		
?>
<style>
	html{
		font-family: "Myriad-Pro";
	}
</style>
<html>
<link rel="stylesheet" type="text/css" href="../../../css/main.css">
<div id="userGuide">
<table>
	<thead>
	<tr>
		<th style="width:100px">Pays</th> <th style="width:100px">Ville</th> <th style="width:50px">Durée</th> <th style="width:180px">Nom du guide</th> <th style="width:80px">Date</th> <th>Etat</th>
	</tr>
	</thead>
	<tbody>
<?php
	
	while($guide = $requete->fetch()){
?>
	<tr>
		<td><?php echo($guide['Pays']); ?></td> <td><?php echo($guide['Ville']); ?></td> <td><?php echo($guide['duration']); ?></td>
		<td><?php echo($guide['Titre']); ?></td> <td><?php echo ($guide['Datetime']); ?></td> <td><?php echo($guide['isValide']); ?></td>
	</tr>

<?php
	}
	$requete->closeCursor();
?>
	</tbody>
</table>
</div>
		