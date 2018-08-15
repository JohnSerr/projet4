<?php

require_once("model/manager.php");


class PostManager extends Manager 
{
	
	public function getlastPost() {

		$bdd =$this->dbconnect();

		$reponse = $bdd->query("SELECT * FROM posts ORDER BY ID DESC LIMIT 0,1");

		return $reponse;
	}

 	public function getPost($postID) {

		$bdd =$this->dbconnect();

		$reponse = $bdd->prepare("SELECT * FROM posts WHERE ID = ? ");

		$reponse->execute(array($postID));

		$post = $reponse->fetch();

		$reponse->closeCursor();

		return $post;

	}
	
	public function getPosts() {

		$bdd = $this->dbconnect();

		$chapters = $bdd->query("SELECT * FROM posts ORDER BY ID DESC LIMIT 0,3");

		return $chapters;
	
	}

	public function countPosts() {

		$bdd = $this->dbconnect();

		$count = $bdd->query("SELECT COUNT(*) AS nb_chapters FROM posts");

		return $count; 

	}
	
	public function selectChapter() {

		$bdd = $this->dbconnect();

		$seChap = $bdd->query("SELECT chapt from posts");

		return $seChap;

	}

	public function convertChap($chapt) {

		$bdd = $this->dbconnect();

		$IDconvert = $bdd->query("SELECT ID from posts where chapt = $chapt");

		$ID = $IDconvert->fetch();  
		
		return $ID;

	}
}

?>