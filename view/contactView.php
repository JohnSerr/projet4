<?php $title = "Contact J.FORTEROCHE"; ?>

<?php ob_start(); ?>

<?php 
	require("header.php");
	require("menu.php");
?>

<div id="contact">
	
		<form action="index.php?action=sendMessage" method="post">
			
		<div id="bloc_nom">	
			<label for="nom">Nom :</label>
			<br>
			<input type="text" name="nom" id="nom" required>
		</div>	
		
		<div id="bloc_mail">
			<label for="mail">Votre e-mail :</label>
			<br>
			<input type="email" name="mail" id="mail" required>
		</div>
			
		<div id="bloc_message">	
			<label for="message">Votre message :</label>
			<br>
			<textarea name="message" id="message" required></textarea>
		</div>
			
			<div id="bouton_contact">
				<input type="submit" value="Envoyer">
			</div>
		</form>

</div>


<?php require("footer.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>	