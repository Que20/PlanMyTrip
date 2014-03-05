<?php
session_start();
include("pages/topbar.php");

?>

            <div id="content">
                <div id="search">
                    <form action="search/index.php?<?php echo isset($_GET['search'])?>">
                    <span style="font-size:25px;text-shadow:0px 0px 2px #999999;">Je recherche un guide pour :</span><br>
                    <input type=text class="searchBar" name="search" placeholder=" Entrez le nom d'une ville">
                    <input type="submit" class="searchGo" value="GO">
                </div>
            </div>
            <div id="intro">
                <div id="back">
                    <div class="imageIntro1"></div><br>
                    Vous revenez de vacances ?<br>
                    Racontez-nous !
                </div>
                <div id="go">
                    <div class="imageIntro2"></div><br>
                    Vous êtes sur le point de partir ?<br>
                    Que prévoyez-vous ..?
                </div>
                <?php

                if (!isset($_SESSION['id']) && !isset($_SESSION['pseudo'])){
                ?>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/pages/registration/"><div id="signup">
                    Inscrivez-vous!
                </div></a>
                <?php
                }
                else{
                ?>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/pages/new_guide/"><div id="propose">
                    Proposez votre Guide
                </div></a>
                <?php
                }
                ?>
                <br><br>
            </div>
            <div id="footer">
            </div>
    </body>
</html>
