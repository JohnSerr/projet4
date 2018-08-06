	
function selectChap() {
	
	var select = document.getElementById("chapters");
	var valeur = select.options[select.selectedIndex].value ;

   	var form = document.getElementById("chapterform");

   	form.setAttribute("action", "index.php?action=post&id="+valeur);


}

