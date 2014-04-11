<?php
session_start();
include("../../pages/topbar.php");

if(isset($_GET['Id_Guide']))
{
    $g =  $_GET['Id_Guide'];
}
try{
	$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '');
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
	$bdd->exec("set names utf8");

}catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}
?>
<?php
$requete = $bdd->prepare("SELECT * FROM guide WHERE Id_Guide LIKE ?");
$requete->execute(array($g));
while($item=$requete->fetch()){
    $user = $bdd->prepare("SELECT Pseudo FROM user WHERE Id_User LIKE ?");
    $user->execute(array($item['Id_User']));
    while($u=$user->fetch()){
	?>
	<div id="guidePage">

		<div id="guideInfos">
			<br><br>
			<a id="backBtn" href="<?php echo $_SERVER["HTTP_REFERER"];?>">&larr; Retours</a><br><br>
			<span id="guideName"><?php echo $item['Ville'].", ".$item['Pays']." : ".$item['Titre'] ?></span><br>
			<span id="guideBy">Soumis par l'utilisateur : <?php echo $u['Pseudo'] ?></span>
		</div>
		<div id="pub1"></div>
		<div id="guideText">
			<?php echo $item['Contenu'];

            if(isset($_SESSION['id']))
            {
                $requeteHasVoted = $bdd->prepare('SELECT hasVoted FROM votesByUser WHERE idGuide=? AND idUser=?');
                $requeteHasVoted->execute(array($item['Id_Guide'],$_SESSION['id']));

                $resultVoteUser = $requeteHasVoted->fetch();

                if(!isset($resultVoteUser['hasVoted']))
                {
                    $create=true;
                }


                $requeteHasVoted->closeCursor();

            }

            ?>
		
        <div id="votes">

            <?php
            if(isset($_SESSION['id']))
            {
                ?>
                <a style="color:black;text-align:center;" href="index.php?Id_Guide=<?php echo $g ?>&votes=like" ><img src="../../img/up.png"></a>
            <?php
            }

            else
            {
                echo("<img src='../../img/up.png'>");
            }

            if(isset($_GET['votes']) && !isset($create)  && isset($_SESSION['id'])){
                if($_GET['votes']=='dislike' && !isset($create)){
                 $requetSubVote = $bdd->prepare('UPDATE votes SET nbDown = nbDown+1 WHERE idGuide =
                (SELECT idGuide FROM votesByUser WHERE idGuide= ? AND idUser = ? AND hasVoted=0);
                UPDATE votesbyuser SET hasvoted=1 WHERE idUser = ? AND idGuide = ? AND hasVoted=0; ');
                    $requetSubVote->execute(array($g, $_SESSION['id'],$_SESSION['id'],$g ));
                }

                else if($_GET['votes']=='like' && !isset($create)  && isset($_SESSION['id'])){
                    $requetSubVote = $bdd->prepare('UPDATE votes SET nbUp = nbUp+1 WHERE idGuide =
                (SELECT idGuide FROM votesByUser WHERE idGuide= ? AND idUser = ? AND hasVoted=0);
                UPDATE votesbyuser SET hasvoted=1 WHERE idUser = ? AND idGuide = ? AND hasVoted=0; ');
                    $requetSubVote->execute(array($g, $_SESSION['id'],$_SESSION['id'],$g ));
                }

                else if($_GET['votes']=='dislike' && $create==true  && isset($_SESSION['id'])){
                    $requetSubVote = $bdd->prepare("INSERT INTO `planmytrip`.`votesbyuser` (`id`,`idUser`, `idGuide`, `hasVoted`) VALUES (?,?,?,?);
                                                    UPDATE votes SET nbDown = nbDown+1 WHERE idGuide =
                                                    (SELECT idGuide FROM votesByUser WHERE idGuide= ? AND idUser = ? AND hasVoted=1);");
                    $requetSubVote->execute(array(NULL,$_SESSION['id'],$g,1,$g,$_SESSION['id']));

                }
                else if($_GET['votes']=='like' && $create==true  && isset($_SESSION['id'])){
                    $requetSubVote = $bdd->prepare("INSERT INTO `planmytrip`.`votesbyuser` (`id`, `idUser`, `idGuide`, `hasVoted`) VALUES (?,?,?,?);
                                                    UPDATE votes SET nbUp = nbUp+1 WHERE idGuide =
                                                    (SELECT idGuide FROM votesByUser WHERE idGuide= ? AND idUser = ? AND hasVoted=1);");
                    $requetSubVote->execute(array(NULL,$_SESSION['id'],$g,1,$g,$_SESSION['id']));
                }
                $requetSubVote->closeCursor();
            }
            $requeteLikes = $bdd->prepare('SELECT nbUp,nbDown FROM votes WHERE idGuide =?');
            $requeteLikes->execute(array(intval($item['Id_Guide'])));
            while($likes = $requeteLikes->fetch()){
            	?>
            	<span style="color:green;"><?php echo($likes['nbUp']);?></span>
                <?php
                if(isset($_SESSION['id']))
                {

                    ?>
                    <a style="color:black" href="index.php?Id_Guide=<?php echo $g ?>&votes=dislike"><img src="../../img/down.png"></a>
                    <?php


                }
                else
                {
                    echo("<img src='../../img/down.png'>");
                }
                ?>

            	<span style="color:red;text-align:center;"><?php echo($likes['nbDown']); ?></span>
            <?php
            }
            $requeteLikes->closeCursor();
            ?>

        </div>
    </div>
		<div id="pub2"></div>


	</div>
	<?php
    }
}
$requete->closeCursor();
?>
<?php include("../footer.php"); ?> 
