<?php 

require("controller.php");

if (isset($_GET["action"])) {

	if($_GET["action"] === "welcome") {

		welcome();

	} else if ($_GET["action"] === "post") {

		if (isset($_GET["id"]) && $_GET["id"] > 0) {

			post();

		} else {
			
			echo "Erreur : aucun identifiant de billet envoyé";
		}	
		

	} 

} else {

	welcome();
}

