<?php


include '../topbar.php';
include_once '../config/config.php';

if(isset($_POST['loginEnt']))
{
// Hachage du mot de passe + rajout de la chaine flt01 et hashage
    $passe_hache = sha1('sx57b&@'.$_POST['password']);
// Vérification des identifiants
    $req = $bdd->prepare('SELECT Id_User,FullName,isValidate FROM user WHERE Pseudo = :Pseudo AND Password = :Password');
    $req->execute(array(
        'Pseudo' => $_POST['pseudo'],
        'Password' => $passe_hache));

    $resultat = $req->fetch();
//Si pas de resultat
    if (!$resultat)
    {
        echo 'Mauvais identifiant ou mot de passe !';
    }
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
        $_SESSION['pseudo'] = $_POST['pseudo'];
        ?>
        <div id='login_status'>
            <br> <br> Connexion autorisée, vous serez bientôt redirigé vers la page d'accueil...
            <br> Si vous n'êtes pas redirigé dans les 5 secondes cliquez <a href="../../index.php"> ici </a>
        </div>
        <script type='text/javascript'>
            setTimeout('window.location.replace("../../index.php")',3000);
        </script>
<?php
    }
}
?>