<?php
session_start();
include("../pages/topbar.php");
$s =  $_GET['search'];
try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', $pdo_options);
	$bdd->exec("set names utf8");
}catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}
?>
<div id="results">
	<div id="reultsTitle">
		Résultat de la cherche pour : <b><?php echo $s ?></b><br>
	</div>

	<div id="resultPage">
	<div id="pub1">
		Publicité plus ou moins invasive1
	</div> 

	<div id="resultsItems"><br>
		<table>
			<?php
            if($s==null)
            {
                echo 'Aucun résultat';
            }
            else
            {

            $requete = $bdd->prepare("SELECT * FROM guide WHERE titre LIKE ? ORDER BY Id_Guide DESC");
            $requete->execute(array('%'.mysql_real_escape_string($s).'%'));


            while($item=$requete->fetch()){


                ?>
                <tr class="result">
                    <td>
                        <div class="resultInfo">
                            <div class="resultName"><a href="../pages/guide/index.php?Id_Guide=<?php echo $item['Id_Guide'] ?>"><?php echo $item['Titre'] ?></a></div>
                            <div class="resultAuthor">Ecris par : <?php echo $item['Id_User'] ?></div>
                            Tags : <a href="#"><span class="resultTag"> Culture </span></a>, <a href="#"><span class="resultTag"> Rock </span></a>
                        </div>
                        <div class="resultVote">
                            <div class="greenthumb"><img class="thumb" src="../img/up.png"><br>25</div>
                            <div class="redthumb"><img class="thumb" src="../img/down.png"><br>25</div>
                        </div>
                        <br>
                    </td>
                </tr>
            <?php
            }

            }?>
		</table>
	</div>

	<div id="pub2">
		Publicité plus ou moins invasive2
	</div> 
	</div>
</div>