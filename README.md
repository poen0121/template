# debug
PHP Library ( PHP >= 5.2 ) CLI,CGI

> About

	Template control.

	Load the file output.

	It is possible to execute a return statement inside an included file in order to terminate processing in
	that file and return to the script which called it.

> Learning Documents

	Please read `readme.php` document.

> Create Template PHP File

	File Top :
	Restrict direct display template file.
	-----------------------------------------
	<?php
	class_exists('hpl_template') OR exit('No direct script access allowed');
	?>
	-----------------------------------------

	Data Array :
	Use the text data.
	If the data array `Array( 'content' => 'text')` calls the `$content` parameter display text.

	Example :
	-----------------------------------------
	<?php
	class_exists('hpl_template') OR exit('No direct script access allowed');//Restrict direct display
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Example Template</title>

		<style type="text/css">
		h1 {
			color: #444;
			background-color: transparent;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}
		#body {
			margin: 0 15px 0 15px;
		}
		</style>
	</head>
	<body>
		<h1>Example Template : <?php echo $content;?></h1>
	</html>
	-----------------------------------------
