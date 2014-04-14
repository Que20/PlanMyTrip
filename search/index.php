<?php
session_start();
include("../pages/topbar.php");
if(isset($_GET['search'])){
    $s =  htmlentities($_GET['search'],ENT_QUOTES);
}else{
    $s = "";
}
if(isset($_GET['search'])){
    $d =  htmlentities($_GET['duration'],ENT_QUOTES);
}else{
    $d = "";
}

try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=localhost;dbname=planmytrip', 'root', '', $pdo_options);
	$bdd->exec("set names utf8");
}catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}
?>
<div id="results">
	<div id="reultsTitle">
		Résultat de la cherche pour : <b><?php echo $s ?></b><br>
	</div>

	<div id="resultPage">
	<div id="pub1">
	</div> 

	<div id="resultsItems"><br>
        <form action="?<?php echo isset($s)."&".isset($d) ?>"  style="padding-bottom:10px;border-bottom:1px solid #D9D9D9;margin-bottom:20px;">
            <span style="font-size:20px;margin-left:20px;">Nouvelle recherche</span> <input type=text class="searchBarSearch" name="search" autocomplete="off"placeholder=" Entrez le nom d'une ville" value="<?php echo $s ?>">

            Durée du séjour :
            <SELECT style="width:60px;" name="duration">
                    <OPTION VALUE="n"> </OPTION>
                    <OPTION VALUE="1">1</OPTION>
                    <OPTION VALUE="2">2</OPTION>
                    <OPTION VALUE="3">3</OPTION>
                    <OPTION VALUE="4">4</OPTION>
                    <OPTION VALUE="5">5</OPTION>
                    <OPTION VALUE="6">6</OPTION>
                    <OPTION VALUE="7">7</OPTION>
                    <OPTION VALUE="8">8</OPTION>
                    <OPTION VALUE="9">9</OPTION>
                    <OPTION VALUE="p">10+</OPTION>
            </SELECT>
            <input type="submit" class="searchGoSearch" value="GO"  style="margin-right:20px;">
            <div id="searchAutocomplete"></div>
        </form>
		<table>
			<?php
            if($s==null){
                echo 'Aucun résultat';
            }
            elseif(strlen($s)<4){
                echo 'Les termes de votre recherche doivent être supérieurs à 3 caractères';
            }
            else{
                if($d == 'n'){
                    $requeteG = $bdd->prepare("SELECT * FROM guide WHERE ville LIKE ? AND `isValide` LIKE ? ORDER BY Id_Guide");
                    $requeteG->execute(array('%'.mysql_real_escape_string($s).'%',1));
                }elseif($d == 'p'){
                    $p = 10;
                    $requeteG = $bdd->prepare("SELECT * FROM guide WHERE ville LIKE ? AND duration >= ? AND `isValide` LIKE ? ORDER BY Id_Guide");
                    $requeteG->execute(array('%'.mysql_real_escape_string($s).'%', $p,1));
                }else{
                    $requeteG = $bdd->prepare("SELECT * FROM guide WHERE ville LIKE ? AND duration LIKE ? AND `isValide` LIKE ? ORDER BY Id_Guide");
                    $requeteG->execute(array('%'.mysql_real_escape_string($s).'%', $d,1));
                }
                while($item=$requeteG->fetch()){
                    $requeteN = $bdd->prepare("SELECT Pseudo FROM user WHERE Id_User LIKE ?");
                    $requeteN->execute(array($item['Id_User']));
                    while($itemNomUser=$requeteN->fetch()){
                ?>
                <tr class="result">
                    <td>
                        <div class="resultInfo">
                            <div class="resultName"><a href="../pages/guide/index.php?Id_Guide=<?php echo $item['Id_Guide'] ?>"><?php echo $item['Ville'].", ".$item['Pays']." : " ?><span style="font-style:italic;color:#8C8C8C;font-size:20px;"><?php echo $item['Titre'] ?><span></a></div>
                            <div class="resultAuthor">Ecris par : <?php echo $itemNomUser['Pseudo'] ?></div>
                            <!--Tags : <a href="#"><span class="resultTag"> Culture </span></a>, <a href="#"><span class="resultTag"> Rock </span></a>-->
                        </div>
                        <div class="resultVote">
                            <div class="greenthumb"><img class="thumb" src="../img/up.png"><br>
                            <?php
                            $votesQuery = $bdd->prepare('SELECT nbUp,nbDown FROM votes WHERE idGuide =?');
                            $votesQuery->execute(array(intval($item['Id_Guide'])));
                            while($votesResult = $votesQuery->fetch())
                            {
                                echo $votesResult['nbUp'];

                            ?>
                            </div>
                            <div class="redthumb"><img class="thumb" src="../img/down.png"><br>
                                <?php
                                echo $votesResult['nbDown'];
                                }

                                $votesQuery->closeCursor();
                                ?>
                            </div>
                        </div>
                        <br>
                    </td>
                </tr>
                <?php
                }
                }
            }?>
		</table>
	</div>

	<div id="pub2">
	</div> 
	</div>
</div>
    <script type="text/javascript">
    var o = [];
    function autocomplete(s, result) {
        if(s && s.length > 2) {
            var r = $('#searchAutocomplete');
            r.css('display','block');
            $.ajax({
                type : "POST",
                url : "../pages/autocomplete.php",
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
                        $('.searchBarSearch').val(li.text());
                        result.css('display','none');
                        $('body').on('click', function(e){
                            result.css('display','none');
                        });
                    });
                    li.hover(function(){
                        li.addClass("aselected");
                    },function(){
                        li.removeClass("aselected");
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
    var s = $(".searchBarSearch").val();
    $(document).ready(function() {
        var i = 0;
        $('.searchBarSearch').on('keyup', function(e) {
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
                autocomplete($(e.target).val(), $('#searchAutocomplete'));
            }
        });
    });

    
    </script>
<?php include("../pages/footer.php"); ?>