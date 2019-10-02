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
		label, input {
			display: block;
			margin-top: 12px;
		}
		input[type="submit"] {
			
			float: right;
			margin-right: 66%;
		}
		table {
			clear: right;
			border-collapse: collapse;
		}
		td, th {
			border: 1px solid black;
			padding: 4px 7px;; 
		}
	</style>
</head>
<body>
<h1> fibonačio seka</h1>
<form method="get" action="">
	<label for="pirma_reiksme">pirma reikšmė</label>
	<input type="number" id="pirma_reiksme" name="pirma_reiksme" value="<?= $fibonacio_seka -> kokiaReiksme( 1 ) ?>">
	<label for="antra_reiksme">antra reikšmė</label>
	<input type="number" id="antra_reiksme" name="antra_reiksme" value="<?= $fibonacio_seka -> kokiaReiksme( 2 ) ?>">
	<label for="kiek_reiksmiu">kiek reikšmių</label>
	<input type="number" id="kiek_reiksmiu" name="kiek_reiksmiu" value="<?= $fibonacio_seka -> iki_kiek ?>">	
	<input type="submit" value="skaičiuoti">
</form>
<table>
	<tr> <th> nr. </th><th> reikšmė</th></tr>
<?php

	$fibonacio_seka -> start();
	 
	while ( $fibonacio_seka -> takeNext() ) { 
?>
		<tr>
			<td><?= $fibonacio_seka -> kuri_reiksme ?></td>
			<td><?= $fibonacio_seka -> kokiaDabarReiksme () ?></td>
		</tr>
<?php
	}
?>	
</table>
</body>
</html>