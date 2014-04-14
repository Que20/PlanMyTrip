<?php session_start(); ?>
<html>
<head>
	<title>PlanMyTrip - Administartion</title>
</head>
<style type="text/css">
body {
	font-family: Helvetica;
	padding: 20px;
	box-shadow: 0px 0px 10px gray;
	width: 800px;
	margin: auto;
}
h1, h2 {
	text-align: center;
}
a, a:visited {
	text-decoration: none;
	color:#0061ff;
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
	<h1>PlanMyTrip</h1>
	<h2>Panneau d'administration</h2>
	<a class="menu" href="#" onclick="adminPanel(0)">Tout</a>
	<a class="menu" href="#" onclick="adminPanel(1)">Validés</a>
	<a class="menu" href="#" onclick="adminPanel(2)">En attente</a>
		<br><hr><br>
	<div id="table"></div>
</body>
<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
function adminPanel(f){
	$('#table').html('');
	$.ajax({
	type	: "POST",
	url		: "admin.php",
	dataType: "json",
	data    : { data : f }
	}).done(function(r){
		var table = $('<table />');
		table.append($('<thead><tr><th>Pays</th><th>Ville</th><th>Durée</th><th>Nom</th><th>Date</th><th>Etat</th></tr></thead>'));
		$(r).each(function(index, item){
			var tr = $('<tr />');
			var pays = $('<td />');
			pays.append(item.pays);
			var ville = $('<td />');
			ville.append(item.ville);
			var duree = $('<td />');
			duree.append(item.duree);
			var nom = $('<td><a href="consult.php?id='+item.id+'">'+item.nom+'</a></td>');
			var date = $('<td />');
			date.append(item.date);
			var etat = $('<td />');
			if(item.etat == 1){
				etat.append($('<img src="../../img/conf.png" />'));
			}else{
				etat.append($('<img src="../../img/unconf.png" />'));
			}
			tr.append(pays);
			tr.append(ville);
			tr.append(duree);
			tr.append(nom);
			tr.append(date);
			tr.append(etat);
			table.append(tr);
		});
		$('#table').append(table);
	}).fail(function(r){
		console.log("fail");
		console.log(r);
	});
}
adminPanel(0);
</script>
</html>