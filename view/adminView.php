
<?php $title = "Administration J.FORTEROCHE" ; ?>

<?php ob_start(); ?>

<?php include("header.php");
	  include("menu.php");
?>

<h3 id="CMchap">Création de chapitres</h3>

<div id="billet">
	<form method="post" action="index.php?action=addPost">
		
	<div id="infobillet">
		<label>Titre du billet : </label>
		<br>
		<input type="text" name="title" id="title" >
		<br>
		<label>Numéro du chapitre : </label>
		<br>
		<input type="number" name="chapt" id="chapt" required>
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
		<input type="submit" name="Ajouter" value="Ajouter">
	</div>

	
	</form>
</div>



<?php require("footer.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("templateAdmin.php"); ?>
