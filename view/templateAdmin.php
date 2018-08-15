<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({

		selector: "#textpost",
		theme: "modern",
		content_css: "css/style.css",
		height: 600,
		toolbar: "newdocument, bold, italic, underline, strikethrough, alignleft, aligncenter, alignright, alignjustify, styleselect, formatselect, fontselect, fontsizeselect, cut, copy, paste, bullist, numlist, blockquote, undo, redo, removeformat"
		})
	</script>	
	
	<title><?= $title ?></title>

</head>

<body>

		<?= $content ?>
		
</body>
</html>