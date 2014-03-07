<?php
session_start();
include("../pages/topbar.php");
$t =  htmlentities($_GET['tag'],ENT_QUOTES);
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
		Tags : <b><?php echo $t ?></b><br>
	</div>

	<div id="resultPage">
	<div id="pub1">
		Publicité plus ou moins invasive1
	</div> 

	<div id="resultsItems"><br>
		<table>
			<?php
            if($s==null){
                echo 'Aucun résultat';
            }
            elseif(strlen($s)<4){
                echo 'Les termes de votre recherche doivent être supérieurs à 3 caractères';
            }
            else{
                if($d == 'n'){
                    $requeteG = $bdd->prepare("SELECT * FROM guide WHERE ville LIKE ? ORDER BY Id_Guide");
                    $requeteG->execute(array('%'.mysql_real_escape_string($s).'%'));
                }elseif($d == 'p'){
                    $p = 10;
                    $requeteG = $bdd->prepare("SELECT * FROM guide WHERE ville LIKE ? AND duration >= ? ORDER BY Id_Guide");
                    $requeteG->execute(array('%'.mysql_real_escape_string($s).'%', $p));
                }else{
                    $requeteG = $bdd->prepare("SELECT * FROM guide WHERE ville LIKE ? AND duration LIKE ? ORDER BY Id_Guide");
                    $requeteG->execute(array('%'.mysql_real_escape_string($s).'%', $d));
                }
                while($item=$requeteG->fetch()){
                    $requeteN = $bdd->prepare("SELECT Pseudo FROM user WHERE Id_User LIKE ?");
                    $requeteN->execute(array($item['Id_User']));
                    while($itemNomUser=$requeteN->fetch()){
                ?>
                <tr class="result">
                    <td>
                        <div class="resultInfo">
                            <div class="resultName"><a href="../pages/guide/index.php?Id_Guide=<?php echo $item['Id_Guide'] ?>"><?php echo $item['Ville'].", ".$item['Pays']." : " ?><span style="font-style:italic;color:#8C8C8C;font-size:20px;"><?php echo $item['Titre'] ?><span></a></div>
                            <div class="resultAuthor">Ecris par : <?php echo $itemNomUser['Pseudo'] ?></div>
                            Tags : <a href="#"><span class="resultTag"> Culture </span></a>, <a href="#"><span class="resultTag"> Rock </span></a>
                        </div>
                        <div class="resultVote">
                            <div class="greenthumb"><img class="thumb" src="../img/up.png"><br>
                            <?php
                            $votesQuery = $bdd->prepare('SELECT nbUp,nbDown FROM votes WHERE idGuide =?');
                            $votesQuery->execute(array(intval($item['Id_Guide'])));
                            while($votesResult = $votesQuery->fetch())
                            {
                                echo $votesResult['nbUp'];

                            ?>
                            </div>
                            <div class="redthumb"><img class="thumb" src="../img/down.png"><br>
                                <?php
                                echo $votesResult['nbDown'];
                                }

                                $votesQuery->closeCursor();
                                ?>
                            </div>
                        </div>
                        <br>
                    </td>
                </tr>
                <?php
                }
                }
            }?>
		</table>
	</div>

	<div id="pub2">
		Publicité plus ou moins invasive2
	</div> 
	</div>
</div>
<?php include("../pages/footer.php"); ?>