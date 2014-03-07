<?php
session_start();
include("pages/topbar.php");
?>
            <div id="content">
                <div id="textPres">Hello world ! Brace yourself, this site is awesome..!</div>
                <div id="search">
                    <form action="search/index.php?<?php echo isset($_GET['search']);?>&<?php echo isset($_GET['duration']);?>">
                    <span style="font-size:25px;text-shadow:0px 0px 2px #999999;">Je recherche un guide pour :</span><br>
                    <input type="hidden" name="duration" value="n">
                    <input type=text class="searchBar" name="search" placeholder=" Entrez le nom d'une ville">
                    <input type="submit" class="searchGo" value="GO">
                    </form>
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
                <div id="signup">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/pages/registration/">Inscrivez-vous!</a>
                </div>
                <?php
                }
                else{
                ?>
                <div id="propose">
                    <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/pages/new_guide/">Proposez votre Guide</a>
                </div>
                <?php
                }
                ?>
                <br><br>
            </div>
            <?php include("pages/footer.php"); ?>
    </body>
</html>
 