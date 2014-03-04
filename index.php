<?php
session_start();
include("pages/topbar.php");
?>

            <div id="content">
                <div id="search">
                    <span style="font-size:25px;text-shadow:0px 0px 2px #999999;">Je recherche un guide pour :</span><br>
                    <input type=text class="searchBar" name="pseudo" placeholder=" Entrez le nom d'une ville">
                    <INPUT type="submit" class="searchGo" value="GO">
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
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/pages/registration/"><div id="signup">
                    Inscrivez-vous!
                </div></a><br><br>
            </div>
            <div id="footer">
            </div>


        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>-->
    </body>
</html>
