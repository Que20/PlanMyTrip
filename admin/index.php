<?php session_start(); ?>
<?php
if(isset($_SESSION['id']) && $_SESSION['id'] == 0){
if(isset($_GET['filtre'])){
	$filtre =  htmlentities($_GET['filtre'],ENT_QUOTES);
}else{
	$filtre = 0;
}
?>
<html>
<head>
	<title>Administartion</title>
</head>
<style type="text/css">
body {
	font-family: Helvetica;
	padding: 20px;
	border-left:1px solid black;
	border-right:1px solid black;
	box-shadow: 0px 0px 10px black;
	width: 800px;
	margin: auto;
}
h1 {
	text-align: center;
}
.menu {
	text-decoration: none;
	color:#428bca;
	margin-left: 50px;
}
table{
	width: 750px;
	margin:auto;
}
thead {
	text-align: left;
}
</style>
<body>
	<h1>Panneau d'administration</h1>
	<div>
		<a class="menu" href="?filtre=0">Tout</a>
		<a class="menu" href="?filtre=1">Validés</a>
		<a class="menu" href="?filtre=2">En attente</a>
		<br><br>
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
		?>

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
				<td><?php echo($guide['Pays']); ?></td>
				<td><?php echo($guide['Ville']); ?></td>
				<td><?php echo($guide['duration']); ?></td>
				<td><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/admin/consult?id=<?php echo $guide['Id_Guide'] ?>"><?php echo($guide['Titre']); ?></a></td> <td><?php echo ($guide['Datetime']); ?></td>
				<td><?php 
					if($guide['isValide'] == 1){
						echo "<img src='../img/conf.png'/>";
					}else{
						echo "<img src='../img/unconf.png'/>";
					}
					?>
				</td>
			</tr>

		<?php
			}
			$requete->closeCursor();
		?>
			</tbody>
		</table>
	</div>
	<?php } ?>
</body>
</html>