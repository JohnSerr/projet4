<?php

require("model.php");


/* affiche la page d'accueil */

	function welcome() {
	
	$rep = getlastPost();

	require("indexView.php");
}
	
/* affiche un post et ses commentaires */	

	function post() {
		
		$post = getPost($_GET["id"]);
		$comments = getComments($_GET["id"]);
		
		require("postview.php");

}


?>