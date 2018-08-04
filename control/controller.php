<?php

require("model/model.php");


/* affiche la page d'accueil */

	function welcome() {
	
	$rep = getlastPost();

	require("view/indexView.php");
}
	
/* affiche un post et ses commentaires */	

	function post() {
		
		$post = getPost($_GET["id"]);
		$comments = getComments($_GET["id"]);
		
		require("view/postview.php");

}

	function addComment($postID, $author, $comment) {

		$addCom = postComment($postID, $author, $comment);

		if($addCom === false) {
			die("Ajout impossible !");
		} else {

			header("Location : index.php?action=post&id=" . $postID);

		}


	}


?>