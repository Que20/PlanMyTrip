<script>alert('yolo');</script>
<?php
	if(isset($_POST['data'])){
		try{
		$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		mysql_set_charset('utf8');
		}
		catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}

		if($_POST['data']['new'] == $_POST['data']['conf']){
			?><script>alert('yolo');</script><?php
		}else{
			?><script>alert('yolo');</script><?php
		}
	}
?>