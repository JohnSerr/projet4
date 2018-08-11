
<?php $title = "Administration J.FORTEROCHE" ; ?>

<?php ob_start(); ?>

<?php include("header.php");
	  include("menu.php");
?>

<h3 id="CMchap">Création/Modification de chapitres</h3>

<div id="billet">
	<form method="post" action="index.php?action=addPost" id="add_update">
		
	<div id="infobillet">
			<label>Que souhaitez vous faire ?</label>
			<br>
			<select id="fonction" onchange="choice()">
				<option value="choixajouter" id="choixajouter">Ajouter</option>
				<option value="choixmodifier" id="choixmodifier">Modifier</option>
			</select>
			<br>
		<div id="postnumber">
			<label>Numéro du poste à modifier : </label>
			<br>	
			<select id="numberID" onchange="">
				<?php while($listids = $ids->fetch())
{

?>	
		
		<option value="<?=$listids["ID"]?>"><?= $listids["ID"] ?></option>

<?php

}

?>

			</select>
		</div>
			<label>Titre du billet : </label>
			<br>
			<input type="text" name="title" id="title" >
			<br>
			<label>Numéro du chapitre : </label>
			<br>
			<input type="number" name="chapter" id="chapter">
			<br>
			<label>Auteur : </label>
			<br>
			<input type="text" name="author" id="author" >
	</div>	

	<div id="textbillet">
		
		<textarea  name="textpost" id="textpost">
		</textarea>

	</div>

	<div id="soumettre">
		<input type="submit" name="Ajouter" value="Ajouter" id="ajouter">
		<input type="submit" name="Modifier" value="Modifier" id="modifier">
	</div>

	
	</form>
</div>

<h3 id="modo">Modération</h3>


<script type="text/javascript" src="js/ajouter_modifier.js"></script>
<?php require("footer.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("templateAdmin.php"); ?>
