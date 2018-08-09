
<?php $title = "Chapitres"; ?>

<?php ob_start(); ?>

<?php include("header.php");
	  include("menu.php");
?>

<?php $number = $countTot->fetch(); ?>

<div id="MaxChapter">
	<p> Il y a actuellement <?= $number["nb_chapters"] ?> chapitres publié(s). Les trois plus récents sont affichés sur la page.</p>
</div>



<div id="selectchapters">
	<form action="index.php?action=post&amp;id=1" method="post" id="chapterform" onchange="selectChap()">
		<label for="chapters">Choississez votre chapitre : </label>
		<select  name="chapters" id="chapters">
<?php for($i = 1 ; $i <= $number["nb_chapters"] ; $i++) 
{

?>	
		
		<option id="chap<?php echo $i ?>" class="chap_choosen" value="<?= $i?>"><?= $i ?></option>

<?php

}

?>

		</select>
		<input type="submit" name="Go" value="Go">
	</form>
</div>


<?php $countTot->closeCursor(); ?>

<?php 

while($post = $chaps->fetch()) {

?>

<div id="post">
			<h4><?= htmlspecialchars($post["title"]); ?></h4>
			<p><?= $post["textpost"] ?></p>
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
git sta
<script type="text/javascript" src="js/chapter.js" ></script>

<?php include("footer.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>