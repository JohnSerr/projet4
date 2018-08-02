<?php $title = "Blog de J.Rochefort"; ?>

<?php ob_start(); ?>

<?php include("header.php");
	  include("menu.php");
?>

	<div id="bandeau"></div>

	<div id="intro">
	
		<div id="bienvenue">
			<h2>Bienvenue sur mon Blog !</h2>
		
			<p>Je m'appelle Jean Forteroche.!</p>
			<p>Je m'apprête à vous faire partager mon prochain livre, pas à pas via ce site.</p>
			<p><em>Billet simple pour l'Alaska</em> est son titre.</p>
			<p>Veinard que vous êtes ! Profitez en bien !</p>
			<p id="signature">Jean FORTEROCHE</p>
		</div>


		<div id="livre">
			<img src="livre.jpg" alt="livre">
		</div>

	</div>

	<div id="lastpost">
		place réservé pour le dernier post écrit par Jean Forteroch
	</div>

<?php include("footer.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>