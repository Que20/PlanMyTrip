<!DOCTYPE html>
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
	<?php
	$link1 = 'http://'.$_SERVER['HTTP_HOST']."/PlanMyTrip/css/normalize.min.css";
	$link2 = 'http://'.$_SERVER['HTTP_HOST']."/PlanMyTrip/css/main.css";
	?>

    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/css/normalize.min.css">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/css/main.css">
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
<div id="top">
    <div id="topbar">
        <div id="title">
            <h1>PlanMyTrip</h1>
        </div>
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
            <form method=post action="pages/home/">
                <input type=text class="loginName" name="pseudo" placeholder=" Pseudo">
                <input type=password class="loginPassword" name="pseudo" placeholder=" Mot de Passe">
                <input type="submit" class="go" value="login">
            </form>
        </div>
     </div>
</div>
</html>
</body>