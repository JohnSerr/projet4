<?php

require_once("model/manager.php");

class CommentManager extends Manager

{
	function getComments($postID) {

	$bdd =$this->dbconnect();

	$comments = $bdd->prepare("SELECT * FROM COMMENTS WHERE post_ID = ? ORDER BY  date_comment DESC");

	$comments->execute(array($postID));

	return $comments;

}

function postComment($postID, $author, $comment) {

	$bdd =$this->dbconnect();

	$comments = $bdd->prepare("INSERT INTO comments(post_ID, author, comment, date_comment) VALUES(?, ?, ?, NOW())");

	$comments->execute(array($postID, $author, $comment));

	return $addCom;
}



};

?>