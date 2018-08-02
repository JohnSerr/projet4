<?php $title = "Blog de J.Rochefort"; ?>

<?php ob_start(); ?>

<?php include("header.php")
	  include("menu.php")
?>

	<div id="intro">
		
		<h2>Bienvenue sur mon Blog !</h2>
		
		<p>Je m'appelle Jean Rochefort. Auteur dans le domaine de la fantasy !</p>
		<p>Je m'apprête à vous faire partager mon prochain livre, pas à pas via ce site.</p>
		<p>Veinard que vous êtes ! Profitez en bien !</p>
	
	</div>


	<div id="livre">
		<img src="livre.jpg">
	</div>


	<div id="lastpost">
		
	</div>

<?php include("footer.php"); ?>

<?php $content = ob_get_clean(); ?>

