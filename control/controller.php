<?php


require_once("model/postManager.php");
require_once("model/commentManager.php");

/* affiche la page d'accueil */

	function welcome() {
	
	$lastPost = new	PostManager();

	$rep =$lastPost->getlastPost();

	require("view/indexView.php");
}
	
/* affiche un post et ses commentaires */	

	function post() {
		

		$p = new PostManager();
		$c = new CommentManager();

		$post = $p->getPost($_GET["id"]);
		$comments = $c-> getComments($_GET["id"]);
		
		require("view/postview.php");

}

	function addComment($postID, $author, $comment) {

		$com = new CommentManager();

		$addCom =$com->postComment($postID, $author, $comment);

		if($addCom === false) {
			die("Ajout impossible !");
		} else {

			header("Location : index.php?action=post&id=" . $postID);

		}


	}


?>