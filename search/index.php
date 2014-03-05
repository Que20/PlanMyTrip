<?php
session_start();
include("../pages/topbar.php");
$s =  $_GET['search'];
?>

<div id="results">
	<div id="reultsTitle">
		Résultat de la cherche pour : <b><?php echo $s ?></b><br>
	</div>
	<div id="resultsItems"><br>
		<table>
			<tr class="result">
			<td>
				<div class="resultInfo">
					<div class="resultName"><a href="#">KIkoo lol</a></div>
					<div class="resultAuthor">Ecris par : </div>
					Tags : <a href="#"><span class="resultTag"> Culture </span></a>, <a href="#"><span class="resultTag"> Rock </span></a>
				</div>
				<div class="resultVote">
					<div class="greenthumb"><img class="thumb" src="../img/up.png"><br>25</div>
					<div class="redthumb"><img class="thumb" src="../img/down.png"><br>25</div>
				</div>
				<br>
			</td>
			</tr>
			<tr class="result">
			<td>
				<div class="resultInfo">
					<div class="resultName"><a href="#">KIkoo lol</a></div>
					<div class="resultAuthor">Ecris par : </div>
					Tags : <span class="resultTag"> Culture </span>, <span class="resultTag"> Rock </span>
				</div>
				<div class="resultVote">
					<div class="greenthumb"><img class="thumb" src="../img/up.png"><br>25</div>
					<div class="redthumb"><img class="thumb" src="../img/down.png"><br>25</div>
				</div>
				<br>
			</td>
			</tr>
		</table>
	</div>

	<div id="pub">
		Publicité plus ou moins invasive
	</tab> 
</div>