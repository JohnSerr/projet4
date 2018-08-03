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

	$reponse = $bdd->query("SELECT * FROM POSTS ORDER BY ID DESC LIMIT 0,1");

	return $reponse;
};

?>