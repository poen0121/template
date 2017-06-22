<?php
class_exists('hpl_template') OR exit('No direct script access allowed');
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