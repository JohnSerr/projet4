
<?php $title = "Blog de J.FORTEROCHE"; ?>

<?php ob_start(); ?>

<?php include("header.php");
	  include("menu.php");
?>

	<div id="bandeau"></div>

	<div id="intro">
	
		<div id="bienvenue">
			<h2>Bienvenue sur mon Blog !</h2>
		
			<p>Je m'appelle Jean Forteroche !</p>
			<p>Je m'apprête à vous faire partager mon prochain livre, pas à pas via ce site.</p>
			<p><em>Billet simple pour l'Alaska</em> est son titre.</p>
			<p>Veinard que vous êtes ! Profitez en bien !</p>
			<p id="signature">Jean FORTEROCHE</p>
		</div>


		<div id="livre">
			<img src="livre.jpg" alt="livre">
		</div>

	</div>

		<?php 

		$data = $rep->fetch()

		?>
		<h3 id="lastadd">Dernier ajout</h3>
		<div id="lastpost">
			<h4><?php echo htmlspecialchars($data["title"]); ?></h4>
			<p><?php echo htmlspecialchars($data["text"]); ?></p>
			</br>
			<div id="postinfo">
				<em><?php echo "Ajouté le : " . $data["time"] . " par " . htmlspecialchars($data["author"]); ?></em>
				</br>
				<em><a href="post.php?action=post&amp;id=<?php echo $data["ID"]; ?>">Commentaires</a></em>
			</div>
		</div>
		
		<?php $rep->closeCursor(); ?>

<?php include("footer.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>