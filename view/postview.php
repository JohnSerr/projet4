
<?php $title = htmlspecialchars($post["title"]); ?>

<?php ob_start() ?>
	
<?php	include("header.php");
		include("menu.php");
?>
	<div id="post">
			<h4><?= htmlspecialchars($post["title"]); ?></h4>
			<p><?= htmlspecialchars($post["text"]); ?></p>
			</br>
			<div id="postinfo">
				<em><?= "Ajouté le : " . $post["time"] . " par " . htmlspecialchars($post["author"]); ?></em>
				</br>
				
			</div>
	</div>

	<h4 id="comments">Commentaires</h4>

<?php

while($comment = $comments->fetch()) {

?>


	<div id="bloc_com">
		<p><?="<strong>". htmlspecialchars($comment["author"]) . "</strong>". " le " . "<em>" . htmlspecialchars($comment["date_comment"]) . "</em>"; ?><p>
		<p><?= htmlspecialchars($comment["comment"]); ?></p>	
	</div>


<?php

}

$comments->closeCursor();

?>

<h4 id="ajout_com">Ajouter un commentaire</h4>

<form action="index.php?action=addComment&amp;id=<?= $post["ID"] ?>" method="post">
	<div id="pseudo">
		<label for="author">Pseudonyme : </label>
		<br/>
		<input type="text" name="author" id="author">
	</div>

	<div id="champ_com">
		<label for="comment">Commentaire : </label>
		<br/>
		<textarea name="comment" id="comment"></textarea> 
	</div>

	<div id="envoyer">
		<input type="submit" name="Envoyer" value="Envoyer"> 
	</div>	



<?php include("footer.php"); ?>
<?php $content = ob_get_clean(); ?>


<?php require("template.php"); ?>