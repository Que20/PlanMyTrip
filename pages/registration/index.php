<?php
	include('../topbar.php');

?>

<div id="regform">
	<form action="registration.php" method="post">
		Pseudo : <input type=text class="loginName" name="pseudo"><br>
		NOM Prénom : <input type=text class="realname" name="realname"><br>
		Mail : <input type=mail class="mail" name="mail"><br>
		Mdp  : <input type=password class="mdp" name="mdp"><br>
		
		<input type=submit class="validateRegistration" value="Valider">
	</form>
</div>
