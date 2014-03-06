<?php
	session_start();
	include('../topbar.php');
	if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
	?>
	
	<div id="edit_profile">
	
		<div id="edit_infos">
			Modifiez vos informations<br><br>
			<form action="edit_profile.php" method="post" enctype="multipart/form-data">
				<table class="tableMod" border="0">
					<tr>
				<td>Nom Complet</td>
				<td><input type=text class="regRealname" name="realname"></td>
					</tr>
					<tr>
				<td >Email</td>
				<td><input type=mail class="regMail" name="mail" ></td>
					</tr>
				</table>
				<br><input type=submit class="validateEdition" value="Valider">
			</form><br>
		</div>
		
		<div id="edit_password">
			Changez votre mot de passe<br><br>
			<form action="edit_password.php" method="post" enctype="multipart/form-data">
				<table class="tableMod" border="0">
					<tr>
				<td>Ancien mot de passe</td>
				<td><input type=password class="editmdp" name="oldmdp" required></td>
					</tr>
					<tr>
				<td >Nouveau mot de passe</td>
				<td><input type=password class="editmdp" name="newmdp" required></td>
					</tr>
					<tr>
				<td >Confirmation</td><td>
				<input type=password class="editmdp" name="confnewmdp" required></td>
					</tr>
				</table>
				<br><input type=submit class="validateEdition" value="Valider">
			</form>
		</div>
	</div>
	<?php
	}
	else{
		?>
		<br><br><br><br><div id="coError" style="width:600px;margin:auto;"> vous devez être connécté pour afficher cette page !</div>
		<?php
	}
?>