function choice() {

	var select = document.getElementById("fonction");
	
	var valeur = select.options[select.selectedIndex].value;
	
	var form = document.getElementById("add_update");
	
	var selectid = document.getElementById("postnumber");	

	var addbutton = document.getElementById("ajouter");
	
	var updatebutton = document.getElementById("modifier");

		if ( valeur === "choixajouter") {
		
			form.setAttribute("action", "index.php?action=addPost");
		
			selectid.style.display = "none";

			addbutton.style.display = "inline";

			updatebutton.style.display = "none";

			document.getElementById("title").setAttribute("value", "");
			document.getElementById("chapter").setAttribute("value", "");
			document.getElementById("author").setAttribute("value", "");
			tinyMCE.get("textpost").setContent("");
		
		} else if (valeur === "choixmodifier") {

			form.setAttribute("action" , "index.php?action=modifyPost");

			selectid.style.display = "block";

			addbutton.style.display = "none";

			updatebutton.style.display = "inline";
		}
}