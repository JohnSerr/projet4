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
		

	} else if ($_GET["action"] ==="addComment") {
		
		if(isset($_GET["id"]) && $_GET["id"] > 0){
			if(!empty($_POST["author"]) && !empty($_POST["comment"])) {

					addComment($_GET["id"], $_POST["author"], $_POST["comment"]);

				} 

				else {

				echo "Erreur : Champ vide !";

				}

			}

			else{

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


	}





}	else {

	welcome();
}

