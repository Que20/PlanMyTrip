<?php
session_start();
try{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', $pdo_options);
    $bdd->exec("set names utf8");
}catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}
include("pages/topbar.php");
?>
            <div id="content">
                <div id="textPres">Laissez-vous guider..!</div>
                <div id="search">
                    <form action="search/index.php?<?php echo isset($_GET['search']);?>&<?php echo isset($_GET['duration']);?>">
                    <span style="font-size:25px;text-shadow:0px 0px 2px #999999;">Je recherche un guide pour :</span><br>
                    <input type="hidden" name="duration" value="n">
                    <input type=text class="searchBar" name="search" placeholder=" Entrez le nom d'une ville" autocomplete="off">
                    <input type="submit" class="searchGo" value="GO">
                    <div id="autocomplete"></div>
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
            <div style="font-weight:bold;font-size:25px;margin-top:20px;margin-bottom:15px;text-align:center;">Derniers guides publiées</div>
            <div id="last">
                <br><table>
                    <thead>
                    <tr>
                        <th style="width:50px"></th>
                        <th style="width:250px">Pays, Ville</th>
                        <th style="width:70px">Durée</th>
                        <th style="width:80px">Auteur</th>
                        <th style="width:80px">Votes</th>
                        <th style="width:50px"></th>
                    </tr>
                    </thead>
                    <tbody>    
                    <?php
                    $lastGuids = $bdd->prepare("SELECT * FROM guide ORDER BY Id_Guide DESC LIMIT 0 , 5");
                    $lastGuids->execute();
                    while($guide=$lastGuids->fetch()){
                        $user = $bdd->prepare("SELECT Pseudo FROM user WHERE Id_User LIKE ?");
                        $user->execute(array($guide['Id_User']));
                        $vote = $bdd->prepare("SELECT  `nbDown` ,  `nbUp` FROM  `votes` WHERE  `idGuide` LIKE ?");
                        $vote->execute(array($guide['Id_Guide']));
                        while($u=$user->fetch()){
                            while($v=$vote->fetch()){
                    ?>
                    
                    <tr>
                        <td></td>
                        <td><a href="pages/guide/index.php?Id_Guide=<?php echo $guide['Id_Guide'] ?>" style="color:black;"><?php echo $guide['Titre']; ?></a></td>
                        <td><?php echo $guide['duration']; ?> Jours</td>
                        <td><?php echo $u['Pseudo']; ?></td>
                        <td><?php echo $v['nbUp']-$v['nbDown']; ?></td>
                        <td></td>
                    </tr>
                    
                    <?php
                                }
                            }
                        }
                    ?>
                    </tbody>
                </table><br>
            </div>
            <?php include("pages/footer.php"); ?>
    </body>
    <script type="text/javascript">
    var o = [];
    function autocomplete(s, result) {
        if(s && s.length > 2) {
            var r = $('#autocomplete');
            r.css('display','block');
            $.ajax({
                type : "POST",
                url : "pages/autocomplete.php",
                dataType : "json",
                data : { data : s }
            }).done(function(data) {
                console.log(data);
                o = data;
                var ul = $('<ul />');
                $(data).each(function(index, item) {
                    var li = $('<li />');
                    li.text(item);
                    li.on('click', function(e){
                        $('.searchBar').val(li.text());
                    });
                    li.hover(function(){
                        li.addClass("selected");
                    },function(){
                        li.removeClass("selected");
                    });
                    ul.append(li);
                });
                result.html(ul);
            }).fail(function() {
                result.html('<p> Une erreur est survenue </p>');
            });
        } else {
            result.css('display','none');
            result.html('');
        }
    }
    var s = $(".searchBar").val();
    $(document).ready(function() {
        $('#textPres').css('margin-left', ($(window).width()/2)-150);
        $('#search').css('left', ($(window).width()/2)-220);
        $(window).resize(function(){
            $('#textPres').css('margin-left', ($(window).width()/2)-150);
            $('#search').css('left', ($(window).width()/2)-220);
            console.log("hello");
        });
        var i = 0;
        $('.searchBar').on('keyup', function(e) {
            if(e.keyCode == 40){
                if(i <= 3){
                    $(e.target).val(o[i]);
                    $(document.getElementsByTagName("li")).removeClass("aselected");
                    $(document.getElementsByTagName("li")[i]).addClass("aselected");
                    i = i + 1;
                    if(i == 0){
                        $(e.target).val(s);
                    }
                }
            }else if(e.keyCode == 38){
                if(i <= 3){
                    i--;
                    $(document.getElementsByTagName("li")).removeClass("aselected");
                    $(document.getElementsByTagName("li")[i]).addClass("aselected");
                if(i == 0){
                    $(e.target).val(s);
                }else{
                    $(e.target).val(o[i]);
                }
            }
            }else{
                autocomplete($(e.target).val(), $('#autocomplete'));
            }
        });
    });

    
    </script>
</html>
 