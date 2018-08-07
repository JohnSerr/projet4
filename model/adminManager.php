<?php

require("model/manager.php");

class AdminManager extends Manager {

	public function getLogin() {

		$bdd = $this->dbconnect();

		$logs = $bdd->prepare("SELECT pass FROM admin WHERE pseudo = :pseudo");

		$logs->execute(array( 

		 ":pseudo" => $pseudo
		 ));

		$logsdata = $logs->fetch();

		return $logsdata ;
	}

}