<?php 

require("control/controller.php");


if (isset($_GET["action"])) {

	if($_GET["action"] === "welcome") {

		welcome();

	} else if ($_GET["action"] === "post") {
		if (isset($_GET["id"]) && $_GET["id"] > 0) {

			post();

		} else {
			
			echo "Erreur : aucun identifiant de billet envoyé";
		}	
	
	} else if ($_GET["action"] === "report") {
		if(isset($_POST["comID"]) && ($_POST["comID"]) > 0 && isset($_GET["id"]) && $_GET["id"] > 0) {

				reportC($_POST["comID"]);

		} else {

			echo "Error : le numéro de commentaire n'est pas connu";

		}

	} else if ($_GET["action"] ==="addComment") {
		if(isset($_GET["id"]) && $_GET["id"] > 0){
			if(!empty($_POST["author"]) && !empty($_POST["comment"])) {

					addComment($_GET["id"], $_POST["author"], $_POST["comment"]);

				} 

				else {

				echo "Erreur : Champ vide !";

				}
			}

			else {

				echo "Erreur : pas d'ID !";
			}	

	} else if ($_GET["action"] === "contact") {
			
			contact();
	
	} else if ($_GET["action"] === "sendMessage") {
		if (!empty($_POST["nom"]) && !empty($_POST["mail"]) && !empty($_POST["message"]))
			{

				sendMessage($_POST["nom"], $_POST["mail"], $_POST["message"] );
			} else {

				echo "Erreur: envoie impossible";
			}

	} else if ($_GET["action"] === "chapters") {

		chapters();

	} else if ($_GET["action"] === "convert") {
		chapId($_POST["chapters"]);

	} else if ($_GET["action"] === "loginform") {
	session_start();
			if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true ) {
				
				header("Location: index.php?action=admin");

			} else {

				logform();
			}

	} else if ($_GET["action"] === "trylogin") {
		if(!empty($_POST["pseudo"]) && !empty($_POST["password"])) {

			tryLogin($_POST["pseudo"]);	
		} else {

			echo "champ vide";
		}

	} else if ($_GET["action"] === "admin") {

			session_start();

		if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true ) {

			admin();

		} else {

			header("Location: index?action=loginform");
		}
	
	} else if ($_GET["action"] === "addPost") {
		if (!empty($_POST["title"]) && !empty($_POST["chapter"]) && $_POST["chapter"] > 0 && !empty($_POST["author"]) && !empty($_POST["textpost"])) {
				if (isDoubChap($_POST["chapter"]) < 1) {
			
				addPost($_POST["title"], $_POST["chapter"], $_POST["author"], $_POST["textpost"]);
				echo "Chapitre envoyé !<br> ";
				echo "<a href=\"index.php?action=admin\">Revenir à l'administration</a>";
				
			} else {
				
				echo "Ce chapitre existe déjà !<br>";
				echo "<a href=\"index.php?action=admin\">Revenir à l'administration</a>";
				
			}

		} else {

			echo "Au moins un champ est vide.<br>";
			echo "<a href=\"index.php?action=admin\">Revenir à l'administration</a>";
		}


	} else if ($_GET["action"] === "autocomplete") {
		if (isset($_GET["id"]) && $_GET["id"] > 0) 

		{

			echo autocomplete($_GET["id"]);

		} else {

			echo "Pas d\'identifiant spécifié.";

		}

	} else if ($_GET["action"] === "modifyPost") {
		if (!empty($_POST["title"]) && !empty($_POST["chapter"]) && !empty($_POST["author"]) && !empty($_POST["textpost"])) {

			updateP($_POST["title"], $_POST["chapter"], $_POST["author"], $_POST["textpost"], $_POST["number"]);
			echo "Chapitre mis à jour !";
			echo "<a href=\"index.php?action=admin\">Revenir à l'administration</a>";
		} else {

			echo "Error : Au moins un champ est vide.";

		}

	} else if ($_GET["action"] === "deletepost") {
		if (isset($_POST["deletenumber"]) && $_POST["deletenumber"] > 0) {

			postToDelete($_POST["deletenumber"]);	

		} else {

			echo "Error : Pas de numéro d'identification envoyé.";
		}

	} else if ($_GET["action"] === "ignorereport") {
		if(isset($_POST["comID"]) && $_POST["comID"] > 0) {

			igReport($_POST["comID"]);

		} else {

			echo "Error :Pas de numéro d'identification envoyé.";

		}
	
	} else if ($_GET["action"] === "delcom") {
	 	if(isset($_POST["comID"]) && $_POST["comID"] > 0) {

	 		delCom($_POST["comID"]);

	 	} else {

	 		echo "Error : Pas de numéro d'identification envoyé.";


	 	}
	
	} else if ($_GET["action"] === "logout") {

		session_start();

		$_SESSION = array();

		session_destroy();

		header("Location: index.php?action=welcome");

	}


} else {

	welcome();
}

