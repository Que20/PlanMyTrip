<!DOCTYPE html>
    <html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>PlanMyTrip</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/favicon.ico" />

    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/css/normalize.min.css">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/css/main.css">
</head>
<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/js/vendor/modernizr-2.6.2.min.js"></script>
<body>
<div id="top">
    <div id="topbar">
        <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/"><div id="title">
            <h1>PlanMyTrip</h1>
        </div></a>
                <!--<div id="menu">
                    <div class="cat">
                        <span style="text-shadow:0px 0px 1px #FFF;">Catégorie 1</span>
                    </div>
                    <div class="cat">
                        <span style="text-shadow:0px 0px 1px #FFF;">Catégorie 2</span>
                    </div>
                    <div class="cat">
                        <span style="text-shadow:0px 0px 1px #FFF;">Catégorie 3</span>
                    </div>
                    <div class="cat">
                        <span style="text-shadow:0px 0px 1px #FFF;">Catégorie 4</span>
                    </div>
                </div>-->
        <div id="login">
        <?php

        if(!isset($ip))
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }



        /*Si les variables de session existent affiche la connexion avec l'option de deco
        */
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
            ?>
            <div id="loged">
                <span id="nameLoged">Bonjour <?php echo $_SESSION['pseudo']; ?><span class="account"> <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/pages/user/account/index.php">Mon compte <img style="margin-left:10px;width:15px;height:15px;margin-top:-5px;" src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/img/iconmonstr-user-6-icon-24.png"></span></a></span>
                <a href="/PlanMyTrip/pages/loger/logout.php" style="color:red;padding-left:5px;"> Deconnexion </a>
            </div>
            <?php
        }
        else
        {
            ?>

            <form method=post  style="float: right;margin-right: 10px;" action="/PlanMyTrip/pages/loger/login.php">
                <input type=text class="loginName" name="pseudo" placeholder=" Pseudo">
                <input type=password class="loginPassword" name="password" placeholder=" Mot de Passe">
                <input type="submit" class="go" value="login" name="loginEnt">
            </form>
        <?php
        }
        ?>
     </div>
    </div>
</div>
