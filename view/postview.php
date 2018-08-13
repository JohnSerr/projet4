
<?php $title = htmlspecialchars($post["title"]); ?>

<?php ob_start() ?>
	
<?php	include("header.php");
		include("menu.php");
?>
	<div class="post">
			<h4><?= htmlspecialchars($post["title"]); ?></h4>
			<p><?= ($post["textpost"]) ?></p>
			</br>
			<div class="postinfo">
				<em><?= "Ajouté le : " . $post["time"] . " par " . htmlspecialchars($post["author"])  . " " . "#" . $post["ID"]; ?></em>
				</br>
				
			</div>
	</div>

	<h4 id="comments">Commentaires</h4>

<?php

while($comment = $comments->fetch()) 

{

?>
	
	<div id="<?= "path" . $comment["ID"]?>"></div>
	<div class="bloc_com">

		<p><?="<strong>". htmlspecialchars($comment["author"]) . "</strong>". " le " . "<em>" . htmlspecialchars($comment["date_comment"]) . "</em>"; ?></p>
		<p><?= htmlspecialchars($comment["comment"]); ?></p>
			
			<form action="index.php?action=report&amp;id=<?= $post["ID"]?>" method="post" onsubmit="alert('Commentaire signalé !')">
				
				<input type="text" name="comID" class="comID" value="<?= $comment["ID"] ?>">
				
				<input type="submit" name="signaler" value="Signaler" id="signaler">
			</form>	
	</div>


<?php

}



?>

<h4 id="ajout_com">Ajouter un commentaire</h4>

<form action="index.php?action=addComment&amp;id=<?= $post["ID"] ?>" method="post">
	<div id="pseudonyme">
		<label for="author">Pseudonyme : </label>
		<br/>
		<input type="text" name="author" required>
	</div>

	<div id="champ_com">
		<label for="comment">Commentaire : </label>
		<br/>
		<textarea name="comment" id="comment" required></textarea> 
	</div>

	<div id="envoyer">
		<input type="submit" value="Envoyer" > 
	</div>	



<?php include("footer.php"); ?>
<?php $content = ob_get_clean(); ?>


<?php require("template.php"); ?>