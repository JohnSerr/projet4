<?php


require_once("model/postManager.php");
require_once("model/commentManager.php");
require_once("model/contactManager.php");
require_once("model/adminManager.php");

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
	
	/* ajoute un commentaire dans la bdd et l'affiche sur le poste concerné */

	function addComment($postID, $author, $comment) {

		$com = new CommentManager();
		

		$addCom = $com->postComment($postID, $author, $comment);

		


		if($addCom === false) {
			die("Ajout impossible !");
		} else {
			

			header("Location: index.php?action=post&id=" . $postID);


		}


	}


	function contact() {

		require("view/contactView.php");

	}



 	/* ajoute le message envoyé à la bdd */

	function sendMessage($nom,$mail,$message) {

		$mess = new ContactManager();

		$addnewmess = $mess->postMail($nom,$mail,$message);

		if($addnewmess === false) {

			die("impossible à envoyer");
		}


	}

	/*Affiche les 5 derniers chapitres sur la page*/


	function chapters() {


		$chap = new PostManager();

		$chaps = $chap->getPosts();

		$countTot = $chap->countPosts();

		require("view/chapterView.php");


	



}

	function logform() {


		require("view/logView.php");


}


	function tryLogin() {

		$l = new AdminManager();

		$log = $l->getLogin();

		if(!$logsdata) {

			echo "Erreur login/mdp";

		} else if (password_verify($_POST["password"]), $logsdata["pass"])

				session_start();

				$_SESSION["logged"] = true;

				header("Location: index.php?action=admin");
	}



	function admin() {

		require("view/adminView.php")

	}



?>