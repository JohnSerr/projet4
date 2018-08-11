



/*fonction d'appel et de remplissage*/

function autofill() {

	var select = document.getElementById("number");
	var selectId = select.options[select.selectedIndex].value

	ajaxGet("index.php?action=autocomplete&id=" + selectId, function(reponse) {

			
			var datapost = JSON.parse(reponse);

			console.log(datapost.title);

			document.getElementById("title").setAttribute("value", datapost.title);
			document.getElementById("chapter").setAttribute("value", datapost.chapt);
			document.getElementById("author").setAttribute("value", datapost.author);
			tinyMCE.get("textpost").setContent(datapost.textpost);

			

	})

}