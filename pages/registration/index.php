<?php
	include('../topbar.php');
	$err = 0;
	$errMdp = 0;
	$mdpE = 0;
	$cpE = 0;
	$mailE = 0;
	if(isset($_GET['error'])){
		$err = 1;
		if($_GET['error'] == 1){
			$mdpE = 1;
		}
		if($_GET['error'] == 2){
			$cpE = 1;
		}
		if($_GET['error'] == 3){
			$mailE = 1;
		}
	}
?>
<div id="registration">
	<div id="regImg"></div>

	<div id="regForm">
		Rejoignez la communauté de PlanMyTrip!<br><br>
		<?php
		if ($err) {
		?>
		<div id="regError">
			Oups..!<br>
			<?php
			if($mdpE == 1){
				echo "Le mot de passe doit comporter au moins 3 characteres.";
			}
			if($cpE == 1){
				echo "Les deux mots de passes ne sont pas identiques.";
			}
			if($mailE == 1){
				echo "Erreur lors de l'envoi du mail.";
			}
			?>
		</div>
		<?php
		}
		?>
		<form action="registration.php" method="post">
			<table border="0">
				<tr>
			<td style="width:200px;">Nom Complet</td><td><input type=text class="regRealname" name="realname"></td><td></td>
				</tr>
				<tr>
			<td >Nom d'utilisateur</td><td><input type=text class="regName" name="pseudo" required></td><td></td>
				</tr>
				<tr>
			<td >Email</td><td><input style="width:200px;" type=email class="regMail" name="mail" required pattern="{20}"></td><td></td>
				</tr>
				<tr>	
			<td >Mot de passe</td><td><input type=password class="regPassword" name="mdp" required></td><td style="font-size:12px;"></td>
				</tr>
				<tr>
			<td >Confirmation</td><td><input type=password class="regPassword" name="mdp2" required></td><td></td>
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

<?php include("../footer.php"); ?>