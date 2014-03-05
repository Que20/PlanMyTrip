<?php

include_once '../config/config.php';

include '../topbar.php';

if(isset($_POST['loginEnt']))
{
// Hachage du mot de passe + rajout de la chaine flt01 et hashage
    $passe_hache = sha1('sx57b&@'.$_POST['password']);
// Vérification des identifiants
    $req = $bdd->prepare('SELECT FullName,isValidate FROM user WHERE Pseudo = :Pseudo AND Password = :Password');
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
        echo "Connexion refusée, votre compte n'est pas activé, veuillez confirmer votre compte en cliquant sur le lien qui vous a été envoyer par mail";
    }
//Sinon variable de session crées et connexion
    else if ($resultat['isValidate']=='1')
    {
        session_start();
        $_SESSION['id'] = $resultat['Id_Utilisateur'];
        $_SESSION['email'] = $_POST['Email'];
        ?>
        <div id='login_status'>
            <br> <br> Connexion refusée, votre compte n'est pas activé, veuillez confirmer votre compte en cliquant sur le lien qui vous a été envoyer par mail
        </div>
<?php
    }
}
?>