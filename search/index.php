<?php
session_start();
include("../pages/topbar.php");
$s =  $_GET['search'];
?>

<div id="results">
	<div id="reultsTitle">
		Résultat de la cherche pour : <b><?php echo $s ?></b><br>
		Options de recherche ...
	</div>
	<div id="resultsItems">
		//
	</div> 
</div>