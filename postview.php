
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
		<p><?= htmlspecialchars($comment["author"]) . " le " . "<em>" . htmlspecialchars($comment["date_comment"]) ."<em>"; ?><p>
		<p><?= htmlspecialchars($comment["comment"]); ?>	
	</div>


<?php

}

$comments->closeCursor();

?>


<?php $content = ob_get_clean(); ?>


<?php require("template.php"); ?>