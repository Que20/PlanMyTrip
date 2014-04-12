<?php
	if(isset($_POST['data'])){
		try{
		$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		mysql_set_charset('utf8');
		}
		catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}
		
		$requete = $bdd->prepare('SELECT Pays, Ville, duration, Titre, Datetime, isValide FROM Guide WHERE Id_User = ?');
		$requete = $bdd->execute($_SESSION['id']);
		
?>

<table>
	<tr>
		<td>PAYS</td> <td>VILLE</td> <td>DUREE</td> <td>NOM</td> <td>DATE</td> <td>ETAT</td>
	</tr>
	
<?php
	
	while($requete->fetch()){
?>
	<tr>
		<td><?php echo($requete['Pays']); ?></td> <td><?php echo($requete['Ville']); ?></td> <td><?php echo($requete['duration']); ?></td>
		<td><?php echo($requete['Titre']); ?></td> <td><?php echo($requete['Datetime']); ?></td> <td><?php echo($requete['isValide']); ?></td>
	</tr>

<?php
	}
?>
</table>
		