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
	?>
	<div id="guidePage">
		<div id="guideInfos">
			<span id="guideName"><?php echo $item['Ville'].", ".$item['Pays']." : ".$item['Titre'] ?></span><br>
			<span id="guideBy">Soumis par l'utilisateur : <?php echo $item['Id_User'] ?> <br> le : xx/xx/xxxx</span>
		</div>
		<div id="pub1"></div>
		<div id="guideText">
			<?php echo $item['Contenu'];

            $requeteHasVoted = $bdd->prepare('SELECT hasVoted FROM votesByUser WHERE idGuide=? AND idUser=?');
            $requeteHasVoted->execute(array($item['Id_Guide'],$_SESSION['id']));

            $resultVoteUser = $requeteHasVoted->fetch();

            if(!isset($resultVoteUser['hasVoted']))
            {
                $create=true;
            }
            else if($resultVoteUser['hasVoted']==0)
            {
                echo('<br>N\' a pas voté');
            }
            else if($resultVoteUser['hasVoted']==1)
                echo('<br>A voté');


            $requeteHasVoted->closeCursor();


            ?>
		</div>
        <div id="votes">
            <a href="index.php?Id_Guide=<?php echo $g ?>&votes=like" > Pouce Vert : </a>

            <?php



            if(isset($_GET['votes']))
            {
                if($_GET['votes']=='dislike' && !isset($create))
                {
                 $requetSubVote = $bdd->prepare('UPDATE votes SET nbDown = nbDown+1 WHERE idGuide =
                (SELECT idGuide FROM votesByUser WHERE idGuide= ? AND idUser = ? AND hasVoted=0);
                UPDATE votesbyuser SET hasvoted=1 WHERE idUser = ? AND idGuide = ? AND hasVoted=0; ');
                    $requetSubVote->execute(array($g, $_SESSION['id'],$_SESSION['id'],$g ));
                }

                else if($_GET['votes']=='like' && !isset($create))
                {
                    $requetSubVote = $bdd->prepare('UPDATE votes SET nbUp = nbUp+1 WHERE idGuide =
                (SELECT idGuide FROM votesByUser WHERE idGuide= ? AND idUser = ? AND hasVoted=0);
                UPDATE votesbyuser SET hasvoted=1 WHERE idUser = ? AND idGuide = ? AND hasVoted=0; ');
                    $requetSubVote->execute(array($g, $_SESSION['id'],$_SESSION['id'],$g ));
                }

                else if($_GET['votes']=='dislike' && $create==true)
                {
                    $requetSubVote = $bdd->prepare("INSERT INTO `planmytrip`.`votesbyuser` (`id`,`idUser`, `idGuide`, `hasVoted`) VALUES (?,?,?,?);
                                                    UPDATE votes SET nbDown = nbDown+1 WHERE idGuide =
                                                    (SELECT idGuide FROM votesByUser WHERE idGuide= ? AND idUser = ? AND hasVoted=1);");
                    $requetSubVote->execute(array(NULL,$_SESSION['id'],$g,1,$g,$_SESSION['id']));

                }

                else if($_GET['votes']=='like' && $create==true)
                {
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

            echo($likes['nbUp']);



               ?>

                <a href="index.php?Id_Guide=<?php echo $g ?>&votes=dislike"> Pouce Rouge : </a>
            <?php
                echo($likes['nbDown']);

            }

            $requeteLikes->closeCursor();

            ?>

        </div>
		<div id="pub2"></div>


	</div>
	<?php
}
$requete->closeCursor();
?>
