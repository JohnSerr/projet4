<?php 


function  dbconnect() {

	try

	{

		$bdd = new PDO("mysql:host=localhost; dbname=projet4;charset=utf8", "root", "");

	}

	catch(Exception $e)
	{
			die("Erreur : " . $e->getMessage());
	}

}