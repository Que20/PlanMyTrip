<script src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/js/tiny.editor.packed.js"></script>
<link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/PlanMyTrip/css/tinyeditor.css">
<?php
	include('../topbar.php');
?>

<div id="newGuidePage">
	<div id="pub1"></div>
	<div id="newGuide">

		<span style="font-size:30px;">Proposer un nouveau guide :</span><br><br>
		<div id="indications">
			<?php echo $_SESSION['id']; ?>
			Proposer un guide est la meilleure façon de participer à la vie de PlanMyTrip.<br>
			Ce guide sera accessible à tout les visiteurs de PlanMyTripp (inscrits ou non!).<br>
			Chaque guide doit être validé par un membre de notre équipe de modération (sous 48h).<br>
		</div>
		<span style="font-weight:bold">Evitez les fautes d'orthographes, soyez le plus clair et précis possible.</span><br>

		<form method=post action="/PlanMyTrip/pages/loger/login.php">
			Pour commencer, entrez les informations concernant votre séjour :<br><br>
			<table>
			<tr>
				<td>Pays</td>
				<td><input style="height:30px;width:200px;" type=textname="pseudo" placeholder=" Pays"></td>
			</tr>
			<tr>
				<td>Ville</td>
				<td><input style="height:30px;width:200px;" type=text name="pseudo" placeholder=" Ville"></td>
			</tr>
			<tr>
				<td style="width:150px;">durée du séjour</td>
				<td>
					<SELECT style="width:200px;" name="fonction">
					<OPTION VALUE="1">1</OPTION>
					<OPTION VALUE="2">2</OPTION>
					<OPTION VALUE="3">3</OPTION>
					<OPTION VALUE="4">4</OPTION>
					<OPTION VALUE="5">5</OPTION>
					<OPTION VALUE="6">6</OPTION>
					<OPTION VALUE="7">7</OPTION>
					<OPTION VALUE="8">8</OPTION>
					<OPTION VALUE="9">9</OPTION>
					<OPTION VALUE="10+">10+</OPTION>
					</SELECT>
				</td>
			</tr>
			</table>
			<br>

			À présent, partagez votre experience...<br>
			Conseil : proposez votre guide sous forme de liste.

			<textarea id="tinyeditor"></textarea>

			N'hésitez pas à ajouter des photos, des cartes ou des liens en tout genre.<br>
			Les itinéraires Google Maps ou autres sont les bienvenues.<br><br>
		
			<input type="submit" style="display:block;margin:auto;width:300px;" value="Soumettre" id="propose" name="loginEnt"><br><br>
		</form>

		<script>
		var editor = new TINY.editor.edit('editor', {
			id: 'tinyeditor',
			width: 600,
			height: 275,
			cssclass: 'tinyeditor',
			controlclass: 'tinyeditor-control',
			rowclass: 'tinyeditor-header',
			dividerclass: 'tinyeditor-divider',
			controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
				'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
				'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
				'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
			footer: true,
			fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
			xhtml: true,
			cssfile: 'custom.css',
			bodyid: 'editor',
			footerclass: 'tinyeditor-footer',
			toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
			resize: {cssclass: 'resize'}
		});
		</script>
	</div>
	<div id="help">
		Voir un exemple de guide rédigé
	</div>
</div>