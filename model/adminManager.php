<?php

require_once("model/manager.php");

class AdminManager extends Manager {

	public function getLogin($pseudo) {


		$bdd = $this->dbconnect();

		$logs = $bdd->prepare("SELECT pseudo, pass FROM admin WHERE pseudo = :pseudo");

		$logs->execute(array(":pseudo" => $pseudo));

		$logsdata = $logs->fetch();

		return $logsdata ;
	}

}