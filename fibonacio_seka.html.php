<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Labas pasauli
	</title>
	<style>
		.zalias {
			color: green;
		}
		.raudonas {
			color: red;
		}		
	</style>
</head>
<body>
<h1> fibonačio seka</h1>
<table>
	<tr> <th> nr. </th><th> reikšmė</th></tr>
<?php

	$i = 1;
	 
	while ( $i < $fibonacio_seka -> iki_kiek ) { 
?>
		<tr><td><?= $i ?></td><td><?= $fibonacio_seka -> kokiaReiksme ( $i ) ?></td></tr>
<?php

		$i++;
	}
?>	
</table>
</body>
</html>