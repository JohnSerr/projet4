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

	public function createPost($title, $chapt, $author, $textpost) {

		$bdd = $this->dbconnect();

		$create = $bdd->prepare("INSERT INTO posts(title, chapt, author, time, textpost) VALUES(?, ?, ?, NOW(), ?)");

		$createP = $create->execute(array($title, $chapt, $author, $textpost));

		return $createP;


	}

	public function existedChap ($chapt) {

		$bdd = $this->dbconnect();

		$chap = $bdd->prepare("SELECT chapt FROM posts WHERE chapt = :chapt");

		$exisChap = $chap->execute(array( ":chapt" => $chapt));

		return $exisChap;

	} 

}