
<?php $title = "Administration J.FORTEROCHE" ; ?>

<?php ob_start(); ?>

<?php include("header.php");
	  include("menu.php");
?>

<h3 id="CMchap">Création/Modification de chapitres</h3>

<div id="billet">
	<form method="post" action="index.php?action=addPost" id="add_update">
		
		<div id="infobillet">
				<label>Que souhaitez vous faire ?</label>
				<br>
				<select id="fonction" onchange="choice()">
					<option value="choixajouter" id="choixajouter">Ajouter</option>
					<option value="choixmodifier" id="choixmodifier">Modifier</option>
				</select>
				<br>
			
			<div id="postnumber">
				<label>Numéro du poste à modifier : </label>
				<br>	
				<select name="number" id="number" onchange="autofill()">
					
					<?php while($listids = $ids->fetch()) { ?>	
					<option value="<?=$listids["ID"]?>"><?= $listids["ID"] ?></option>
					<?php } ?>
				
				</select>
			</div>
				<label>Titre du billet : </label>
				<br>
				<input type="text" name="title" id="title">
				<br>
				<label>Numéro du chapitre : </label>
				<br>
				<input type="number" name="chapter" id="chapter">
				<br>
				<label>Auteur : </label>
				<br>
				<input type="text" name="author" id="author" >
		</div>	
		
		<div id="textbillet">
			<textarea  name="textpost" id="textpost"></textarea>
		</div>
		
		<div id="soumettre">
			<input type="submit" name="Ajouter" value="Ajouter" id="ajouter">
			<input type="submit" name="Modifier" value="Modifier" id="modifier">
		</div>
	</form>
</div>

<h3 id="deletepost">Supprimer un chapitre</h3>

<div id="delpost">
	<form id="delete" action="index.php?action=deletepost"  method="post">
		<label for="deletenumber">Choissisez l'identifiant du chapitre à supprimer : </label>
		<select name="deletenumber" id="deletenumber" onchange="">
			
			<?php while($listdelete = $iddelete->fetch()) { ?>	
			<option value="<?=$listdelete["ID"]?>"><?= $listdelete["ID"] ?></option>
			<?php } ?>

		</select>
		<input type="submit" name="deletechapter" value="Supprimer" id="deletechapter" onclick="return confirm('Voulez-vous vraiment supprimer ce billet?');">
	</form>
</div>

<h3 id="modo">Commentaire(s) à modérer</h3>

<?php $comcountr = $countreported->fetch() ?>

<div id="totalreportedcomments">
	<p><?= "Il y a " . $comcountr["nb_reported"] . " commentaire(s) à modérer." ?></p>
</div>

<?php while($reported = $allreportedcom->fetch()) { ?>

	<div class="bloc_com">
		<p><?="<strong>". htmlspecialchars($reported["author"]) . "</strong>". " le " . "<em>" . htmlspecialchars($reported["date_comment"]) . "</em>"; ?></p>
		<p><?= htmlspecialchars($reported["comment"]); ?></p>
		<form method="post" action="" id="ignoreordelete">
		<input type="submit" name="ignorecom" id="ignorecom" value="Ignorer" onclick="ignorCom()">	
		<input type="submit" name="deletecom" id="deletecom" value="Supprimer" onclick="deleteCom()">
		<input type="text" name="comID" class="comID" value="<?= $reported["ID"] ?>">	
		</form>	 
	</div>

<?php }
$allreportedcom->closeCursor(); ?>

<h3 id="logout">Déconnexion</h3>
	<div id="logoutform">
		<form action="index.php?action=logout" method="post">
			<input type="submit" name="buttonlogout" id="buttonlogout" value="Déconnexion">
		</form>
	</div>


<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/ajouter_modifier.js"></script>
<script type="text/javascript" src="js/autofill.js"></script>
<script type="text/javascript" src="js/deleteorignorecom.js"></script>

<?php require("footer.php"); ?>

<?php $content = ob_get_clean(); ?>

<?php require("templateAdmin.php"); ?>
