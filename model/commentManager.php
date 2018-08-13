<?php

require_once("model/manager.php");

class CommentManager extends Manager {
	

	public function getComments($postID) {

	$bdd =$this->dbconnect();

	$comments = $bdd->prepare("SELECT * FROM COMMENTS WHERE post_ID = ? ORDER BY  date_comment DESC");

	$comments->execute(array($postID));

	return $comments;

	}

 	

 	public function postComment($postID, $author, $comment) {

		$bdd =$this->dbconnect();

		$comments = $bdd->prepare("INSERT INTO comments(post_ID, author, comment, date_comment) VALUES(?, ?, ?, NOW())");

		$comments->execute(array($postID, $author, $comment));

		return $comments;
	}	


	public function reportCom($comID) {

		$bdd = $this->dbconnect();

		$com = $bdd->prepare("UPDATE comments SET signaled = 1 WHERE ID = :ID");

		$report = $com->execute(array(":ID" => $comID));



	}



};

?>