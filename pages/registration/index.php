<?php
	include('../topbar.php');

?>

<div id="regform">
	<form action="registration.php" method="post">
		Pseudo : <input type=text class="loginName" name="pseudo">
		NOM Prénom : <input type=text class="realname" name="realname">
		Mail : <input type=mail class="mail" name="mail">
		Mdp  : <input type=password class="mdp" name="mdp">
	</form>
</div>