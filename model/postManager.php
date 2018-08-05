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

	$reponse = $bdd->prepare("SELECT * FROM posts WHERE id = ? ");

	$reponse->execute(array($postID));

	$post = $reponse->fetch();

	return $post;

}
	public function getPosts() {

	$bdd = $this->dbconnect();

	$chapters = $bdd->query("SELECT * FROM posts ORDER BY ID LIMIT 0,5");

	return $chapters;


	}
}

?>