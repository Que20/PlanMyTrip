<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>PlanMyTrip</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/css/normalize.min.css">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/css/main.css">
	</head>
	
	<body>
		<div id="page_admin" style="width:1000px;height:1000px; margin:auto">
			<div id="adminform" style="width:500px;height:500px; margin-top:200px;margin-left:250px;margin-right:250px;">
				<form action="login.php" method="post">
					<table style="width:400px">
						<tr style="height:50px">
							<td><h3>Connexion au panneau d'administration</h3><br></td>
						</tr>
						<tr>
							<td>Identifiant : </td><td><input type="text" name="id_admin"></td>
						</tr>
						<tr>
							<td>Mot de passe :</td><td><input type="password" name="mdp_admin"></td>
						</tr>
						<tr>
							<td><input type="submit" value="Connexion"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>