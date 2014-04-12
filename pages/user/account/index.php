<?php
	session_start();
	include("../../../pages/topbar.php");
	if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){ 
	?>
		<div id="blanc" style="padding-top:70px;"></div>
		<div id ="accountManagment">
		
		</div>
		
		<script type="text/javascript" src="script.js"></script>
		<script type="text/javascript">
		console.log($('infoSubmit'));
		$(document).ready(function() {
			$('infoSubmit').on('click', function(){
				console.log("On es entré! aaah, c'est bon, vas-y salope, rentre en moi!");
				$.ajax({
					type	: "POST",
					url		: "sendInfo.php",
					datatype: "json",
					data 	: 	{
									"fullname" : "Kikoo lol",
									"old"	   : "hello",
									"new"	   : "world",
									"conf"	   : "world"
								}
					}).done(function(){
						console.log("done");
					}).fail(function(){
						console.log("fail");
					});
			});
		});
		</script>
		<?php 
	} 
	else { 
		?>
		<div id="blanc" style="padding-top:200px;"></div>
		<div id="coError" style="width:500px;margin:auto;"> vous devez être connécté pour afficher cette page !</div>
		<?php 
	} 
	?>
	<div id="user_content">
		<div id="sub_content"></div>
		</div>
	<?php include("../../footer.php"); 
?>