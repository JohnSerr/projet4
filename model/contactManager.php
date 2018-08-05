<?php

require_once("manager.php");

class ContactManager extends Manager
{
	public function postMail($nom, $mail, $message) {

		$bdd = $this->dbconnect();

		$newmessage = $bdd->prepare("INSERT INTO contact(nom, mail, message, message_date) VALUES(?, ?, ?, NOW())");

		$newmessage->execute(array($nom,$mail,$message));

		return $newmessage;

	}
}	

?>