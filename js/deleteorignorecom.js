function ignorCom() {

	var form = document.getElementById("ignoreordelete");

	form.setAttribute("action", "index.php?action=ignorereport");
 	
 	return confirm('Voulez-vous vraiment ignorer ce signalement ?');

}

function deleteCom() {

	var form = document.getElementById("ignoreordelete");

	form.setAttribute("action", "index.php?action=delcom");
 	
 	return confirm('Voulez-vous vraiment supprimer ce commentaire ?');

}