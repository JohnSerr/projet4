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

	}

	public function updatePost($title, $chapt, $author, $textpost, $postID) {

		$bdd = $this->dbconnect();

		$update = $bdd->prepare("UPDATE posts SET title = :title, chapt = :chapt, author =:author, textpost = :textpost WHERE ID = $postID");

		$goupdate = $update->execute(array(
			":title" => $title,
			":chapt" => $chapt,
			":author" => $author,
			":textpost" => $textpost,
			));
	}

	public function deletePost($postID) {

		$bdd = $this->dbconnect();

		$nextdelpost = $bdd->prepare("DELETE FROM posts WHERE ID = :ID");

		$deletedpost = $nextdelpost->execute(array(":ID" => $postID));
	
	}

	public function existedChap ($chapter) {

		$bdd = $this->dbconnect();

		$chap = $bdd->prepare("SELECT COUNT(*) AS Nb_repeat FROM posts WHERE chapt = :chapter");

		$chap->execute(array(":chapter" => $chapter));

		$repeat = $chap->fetch();

		return $repeat["Nb_repeat"];

	} 

	public function getAllId() {

		$bdd = $this->dbconnect();

		$allid = $bdd->query("SELECT ID FROM posts");

		return $allid;

	}


	public function countReportedCom() {

		$bdd = $this->dbconnect();

		$totalreported = $bdd->query("SELECT COUNT(*) AS nb_reported FROM comments WHERE signaled = 1");

		return $totalreported;
	}

	public function getReportedCom() {


		$bdd = $this->dbconnect();

		$reportedcoms = $bdd->query("SELECT * FROM comments WHERE signaled = 1");

		return $reportedcoms;
	
	}

	public function ignoreReport($comID) {

		$bdd = $this->dbconnect();

		$igcom = $bdd->prepare("UPDATE comments SET signaled = 0 WHERE ID = :ID");

		$igncom = $igcom->execute(array(":ID" => $comID));

	}

	public function deleteComment($comID) {

		$bdd = $this->dbconnect();

		$nextdelcom = $bdd->prepare("DELETE FROM comments WHERE ID = :ID");

		$deletedcom = $nextdelcom->execute(array(":ID" => $comID));

	}

}