<?php

require_once("manager.php");

class ContactManager extends manager
{
	public function postMail($nom, $mail, $message)

		$bdd = $this.dbconnect();

		$newmessage = $bdd->prepare("INSERT INTO contact(nom, mail, message) VALUES(?, ?, ?, NOW())");

		$newmessage->execute(array($nom,$mail,$message));

		return $newmessage;

}