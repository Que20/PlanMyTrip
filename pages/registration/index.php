<?php
	include('../topbar.php');
	
	if($_GET['mdp'] == -1){
		?>
		<script> alert('Le mot de passe doit contenir au moins 8 caractères !');</script>
	<?php 
	}
?>
<div id="registration">
	<div id="regImg"></div>

	<div id="regForm">
		Rejoignez la communauté de PlanMyTrip!<br><br>
		<form action="registration.php" method="post">
			<table border="0">
				<tr>
			<td style="width:200px;">Nom Complet</td><td><input type=text class="regRealname" name="realname" required></td>
				</tr>
				<tr>
			<td >Nom d'utilisateur</td><td><input type=text class="regName" name="pseudo" required></td>
				</tr>
				<tr>
			<td >Email</td><td><input style="width:223px;" type=mail class="regMail" name="mail" required></td>
				</tr>
				<tr>
			<td >Mot de passe</td><td><input type=password class="regPassword" name="mdp" required></td>
				</tr>
			</table>
			<input type="checkbox" name="licence"> 
			<span style="font-size:10px;">En cochant cette case, j'accepte de prostituer mes informations personnelles et de me faire traquer de publicités à vie. Qui tue. Oui.</span>
			<br><input type=submit class="validateRegistration" value="Valider">
		</form>
	</div>
</div>

<div id="adventages">
- Proposez vos propres guides,<br><br>
- Votez pour ceux que vous avez aimé,<br><br>
- Partagez votre experience,<br><br>
- Profitez d'une communauté enthousiaste,<br><br>
- Des bons plans exceptionnels<br><br>
et bien plus encore !
</div>
