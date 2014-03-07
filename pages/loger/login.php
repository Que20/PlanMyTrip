<?php


include '../topbar.php';
include_once '../config/config.php';

if(isset($_POST['loginEnt']))
{
// Hachage du mot de passe : rajout du sel et hashage
    $passe_hache = sha1('sx57b&@'.htmlentities($_POST['password'], ENT_QUOTES));
// Vérification des identifiants
    $req = $bdd->prepare('SELECT Id_User,FullName,isValidate FROM user WHERE Pseudo = :Pseudo AND Password = :Password');
    $req->execute(array(
        'Pseudo' => htmlentities($_POST['pseudo'], ENT_QUOTES),
        'Password' => $passe_hache));

    $resultat = $req->fetch();
//Si pas de resultat
    if (!$resultat)
    { ?>
        <br><br><br><br><br><div id="logErr"> Mauvais identifiant ou mot de passe </div><br><br><br>
    <?php }
    if($resultat['isValidate']=='0')
    { 
        echo "Connexion refusée, votre compte n'est pas activé, veuillez confirmer votre compte en cliquant sur le lien qui vous a été envoyer par mail
        <br> Vous serez bientôt redirigé vers la page d'accueil";
        ?>
        <script type='text/javascript'>
            setTimeout('window.location.replace("../../index.php")',3000);
        </script>
        <?php
    }
//Sinon variable de session crées et connexion
    else if ($resultat['isValidate']=='1')
    {
        session_start();
        $_SESSION['id'] = $resultat['Id_User'];
        $_SESSION['pseudo'] = htmlentities($_POST['pseudo'],ENT_QUOTES);

        header('location:../../index.php');
    }
}
?>
<?php include("../footer.php"); ?>