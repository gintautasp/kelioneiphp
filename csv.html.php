<!DOCTYPE html>
<?php

	$dir_file = __DIR__;


	$failo_vardas = $dir_file . '/LBMA-taure-2019.csv';
	$csv_delim = ";";
?>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Kelionės
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
		}
		input[ type="checkbox"] {
			display: inline-block;
		}
		label.chbx, input[type="button"] {
			display: inline-block;
		}
	</style>
</head>
<body>
<h1> Csv failas <?= $failo_vardas ?></h1>
<table>
<tr>
	<td>
	</td>
	<th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>F</th><th>G</th><th>H</th><th>I</th><th>J</th>
<?php

	$row = 1;
	
	if  ( ( $handle = fopen ( $failo_vardas, "r" ) ) !== FALSE ) {
	
		while ( ( $data = fgetcsv ( $handle, 0, $csv_delim ) ) !== FALSE ) {
		
			$vardas = $data [ 5 ];
			
		
			$num = count ( $data );
?>	
			<tr><th><?= $row . '(' . $num . ')' ?></th>
<?php			
			for ( $c=0; $c < $num; $c++ ) {
?>			
				<td><?= $data [ $c ] ?></td>
<?php				
			}
			$row++;
?>
			</tr>
<?php
		}
		fclose($handle);
	}
?>	
</table>
</body>
</html>