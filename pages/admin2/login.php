<?php

    include_once '../config/config.php';


    if(isset($_POST['mdp_admin']))
    {
        $passhash = sha1('sx57b&@'.htmlentities($_POST['mdp_admin'], ENT_QUOTES));
        $requete=$bdd->prepare('SELECT * FROM admin WHERE Pseudo = ? AND Password = ?');
        $requete->execute(array($_POST['id_admin'], $passhash));
        $result = $requete->fetch();
        $requete->closeCursor();

        if(!$result){
            ?>
            <h1>Accès refusé</h1>
            <h3>Mauvais identifiants</h3>
            <script type='text/javascript'>
                setTimeout('window.location.replace("index.php")',3000);
            </script>
        <?php
        }
        else{
            session_start();
            $_SESSION['id_admin'] = $result['Id_Admin'];
            $_SESSION['pseudo_admin'] = htmlentities($result['Pseudo'],ENT_QUOTES);
            header('Location:panel.php');
        }

    }

?>

		