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
	/*signal un commentaire et l'envoie à la modération*/

	function reportC($comID) {

		$repc = new CommentManager();

		$repcom = $repc->reportCom($comID);

		header("Location: index.php?action=post&id=" . $_GET["id"] . "#" . "path" . $comID );
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

/*Affiche les 3 derniers chapitres sur la page*/


	function chapters() {


		$chap = new PostManager();

		$chaps = $chap->getPosts();

		$countTot = $chap->countPosts();

		$selChap = $chap->selectChapter();

		require("view/chapterView.php");

}

/* fonction de conversion d'un numéro de chapitre en ID de billet*/

	function chapId($chapt) {

		$convert = new PostManager();

		$cToID = $convert->convertChap($chapt);

		header("Location: index.php?action=post&id=" . $cToID["ID"]);

}

/*affiche le formualire de login*/

	function logform() {


		require("view/logView.php");

}

/*Verifie la correspondance pseudo/mdp et redirige en fonction*/

	function tryLogin($pseudo) {

		$l = new AdminManager();

		$log = $l->getLogin($pseudo);

			if(!$log) {

				echo "Erreur login/mdp";	
			
			} else if (password_verify($_POST["password"], $log["pass"])) {
				session_start();

				$_SESSION["logged"] = true;

				header("Location: index.php?action=admin");
		
			} else {

				echo "Erreur login/mdp";
			}
		
}	

/* Affiche la page admin.php*/

	function admin() {

		$getdata = new AdminManager();

		$ids = $getdata->getAllId(); /*Liste de poste à modifier*/

		$iddelete = $getdata->getAllId(); /*Lise de poste à supprimer*/

		$countreported = $getdata->countReportedCom();

		$allreportedcom =  $getdata->getReportedCom();

		require("view/adminView.php");

}


/*ajoute un chapitre dans la bdd*/

	function addPost($title, $chapt, $author, $textpost) {

		$p = new AdminManager();


		$post = $p->createPost($title, $chapt, $author, $textpost);
}

/*vérifie et empêche un doublon de chapitre*/

	function isDoubChap($chapt) {

		$cha = new AdminManager();

		$doubChap = $cha->existedChap($chapt);

		return $doubChap;
	
}	

/* fonction appeler par ajax pour récupérer les data d'autocomplete*/

	function autocomplete($postID) {


	 	$p = new PostManager();

	 	$infopost = $p->getPost($postID);

		 $infojson = json_encode($infopost, true);

		 return $infojson;

}


/*fonction pour modifier un billet*/

	function updateP($title, $chapt, $author, $textpost, $postID) {

		$update = new AdminManager();

		$pupdate = $update->updatePost($title, $chapt, $author, $textpost, $postID);



}

/*fonction pour supprimer un billet*/

	function postToDelete($postID) {

		$del = new AdminManager();

		$thedelpost = $del->deletePost($postID);



}

/*fonction pour ignorer un signalement de commentaire et remettre la valeur "signaled" de la table comments à 0 */

	function igReport($comID) {

		$com = new AdminManager();

		$igncom = $com->ignoreReport($comID);

		header("Location: index.php?action=admin#modo");

}

	function delCom($comID) {

		$com = new AdminManager();

		$deletecom = $com->deleteComment($comID);

		header("Location: index.php?action=admin#modo");

}
 

?>