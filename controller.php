<?php

require("model.php");



	function welcome() {
	
	$rep = getlastPost();

	require("indexView.php");
}

	function post() {
		
		$post = getPost($_GET["id"]);
		$comments = getComments($_GET["id"]);
		
		require("postview.php");

}


?>