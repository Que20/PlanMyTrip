<?php
			session_start();
		try{
		$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		mysql_set_charset('utf8');
		}
		catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}
		
		$requete = $bdd->prepare('SELECT * FROM Guide WHERE Id_User = ?');
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
		<td><a target="_parent" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/pages/guide/index.php?Id_Guide=<?php echo $guide['Id_Guide'] ?>"><?php echo($guide['Titre']); ?></a></td> <td><?php echo ($guide['Datetime']); ?></td> <td><?php 
		if($guide['isValide'] == 1){
			echo "<img src='../../../img/conf.png'/>";
		}else{
			echo "<img src='../../../img/unconf.png'/>";
		}

		?></td>
	</tr>

<?php
	}
	$requete->closeCursor();
?>
	</tbody>
</table>
</div>
		