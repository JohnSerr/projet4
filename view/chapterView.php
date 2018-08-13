
<?php $title = "Chapitres"; ?>

<?php ob_start(); ?>

<?php include("header.php");
	  include("menu.php");
?>

<?php $number = $countTot->fetch(); ?>

<div id="MaxChapter">
	<p> Il y a actuellement <?= $number["nb_chapters"] ?> chapitres publié(s). Les trois plus récents sont affichés sur la page.</p>
</div>

<?php $countTot->closeCursor(); ?>

<div id="selectchapters">
	<form action="index.php?action=convert" method="post" id="chapterform" >
		<label for="chapters">Choississez votre chapitre : </label>
		<select  name="chapters" id="chapters">
<?php while($listChap = $selChap->fetch())
{

?>	
		
		<option id="chap<?= $listChap["chapt"] ?>" class="chap_choosen" value="<?=$listChap["chapt"]?>"><?= $listChap["chapt"] ?></option>

<?php

}

?>

		</select>
		<input type="submit" name="Go" value="Go">
	</form>
</div>



<?php 

while($post = $chaps->fetch()) {

?>

<div class="post">
			<h4><?= htmlspecialchars($post["title"]); ?></h4>
			<p><?= $post["textpost"] ?></p>
			<br>
			<div class="postinfo">
				<em><?= "Ajouté le : " . $post["time"] . " par " . htmlspecialchars($post["author"])  . " " . "#" . $post["ID"]; ?></em>
				<br>
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