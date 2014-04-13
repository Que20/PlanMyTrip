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
<html>
<table>
	<tr>
		<td>PAYS</td> <td>VILLE</td> <td>DUREE</td> <td>NOM</td> <td>DATE</td> <td>ETAT</td>
	</tr>
	
<?php
	
	while($guide = $requete->fetch()){
?>
	<tr>
		<td><?php echo($guide['Pays']); ?></td> <td><?php echo($guide['Ville']); ?></td> <td><?php echo($guide['duration']); ?></td>
		<td><?php echo($guide['Titre']); ?></td> <td><?php echo($guide['Datetime']); ?></td> <td><?php echo($guide['isValide']); ?></td>
	</tr>

<?php
	}
	$requete->closeCursor();
?>
</table>
		