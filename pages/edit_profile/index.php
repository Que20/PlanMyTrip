<?php
	include('../topbar.php');
?>

<div id="edit_profile">

	<div id="edit_infos">
		Modifiez vos informations<br><br>
		<form action="edit_profile.php" method="post" enctype="multipart/form-data">
			<table border="0">
				<tr>
			<td>Nom Complet</td><td><input type=text class="regRealname" name="realname"></td>
				</tr>
				<tr>
			<td >Email</td><td><input type=mail class="regMail" name="mail" ></td>
				</tr>
			</table>
			<br><input type=submit class="validateEdition" value="Valider">
		</form><br>
	</div>
	
	<div id="edit_password">
		Changez votre mot de passe<br><br>
		<form action="edit_password.php" method="post" enctype="multipart/form-data">
			<table border="0">
				<tr>
			<td style="width:200px;">Ancien mot de passe</td><td><input type=password class="editmdp" name="oldmdp"></td>
				</tr>
				<tr>
			<td >Nouveau mot de passe</td><td><input type=password class="editmdp" name="newmdp" ></td>
				</tr>
				<tr>
			<td >Confirmation</td><td><input type=password class="editmdp" name="confnewmdp" ></td>
				</tr>
			</table>
			<br><input type=submit class="validateEdition" value="Valider">
		</form>
	</div>
</div>