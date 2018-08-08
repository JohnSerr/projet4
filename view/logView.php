
<?php $title = "login Administration" ; ?>

<?php ob_start(); ?>

<?php include("header.php");
	  include("menu.php");
?>

<div id="log">
	<form action="index.php?action=trylogin" method="post">
		<div id="bloc_pseudo">	
			<label for="pseudo">Identifiant : </label>
			<br>
			<input type="text" name="pseudo" id="pseudo" required>
		</div>

		<div id="bloc_pass">
			<label for="password">Password : </label>
			<br>
			<input type="password" name="password" id="password" required>
		</div>
		
		<div id="connec">	
			<input type="submit" name="connexion" id="connexion">
		</div>

</div>


<?php require("footer.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>
