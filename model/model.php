<?php 


function  dbconnect() {

	try

	{

		$bdd = new PDO("mysql:host=localhost; dbname=projet4;charset=utf8", "root", "");

		return $bdd;
		
	}

	catch(Exception $e)
	{
			die("Erreur : " . $e->getMessage());
	}
	
};


function getlastPost() {

	
	$bdd = dbconnect();

	$reponse = $bdd->query("SELECT * FROM posts ORDER BY ID DESC LIMIT 0,1");

	return $reponse;
};

function getPost($postID) {

	$bdd = dbconnect();

	$reponse = $bdd->prepare("SELECT * FROM posts WHERE id = ? ");

	$reponse->execute(array($postID));

	$post = $reponse->fetch();

	return $post;

};


function getComments($postID) {

	$bdd = dbconnect();

	$comments = $bdd->prepare("SELECT * FROM COMMENTS WHERE post_ID = ? ORDER BY  date_comment DESC");

	$comments->execute(array($postID));

	return $comments;

}

function postComment($postID, $author, $comment) {

	$bdd = dbconnect();

	$comments = $bdd->prepare("INSERT INTO comments(post_ID, author, comment, date_comment) VALUES(?, ?, ?, NOW())");

	$comments->execute(array($postID, $author, $comment));

	return $addCom;
}
