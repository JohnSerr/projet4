
<?php $title = "Chapitres"; ?>

<?php ob_start(); ?>

<?php include("header.php");
	  include("menu.php");
?>

<?php 

while($post = $chaps->fetch()) {

?>

<div id="post">
			<h4><?= htmlspecialchars($post["title"]); ?></h4>
			<p><?= htmlspecialchars($post["text"]); ?></p>
			</br>
			<div id="postinfo">
				<em><?= "Ajouté le : " . $post["time"] . " par " . htmlspecialchars($post["author"]); ?></em>
				</br>
				<em><a href="index.php?action=post&amp;id=<?php echo $post["ID"]; ?>">Commentaires</a></em>
			</div>
	</div>

<?php

}

$chaps->closeCursor();

?>


<?php include("footer.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>