<!DOCTYPE html>
<?php

	$dir_file = __DIR__;

	$failo_vardas = $dir_file . '/traukos_desnis.csv';
	$csv_delim = ",";
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
			
			$num = count ( $data );
			eval ( '$' . $data [ 1 ] . $data [ 2 ] );
			$evar  = $data [ 1 ];
?>	
			<tr><th><?= $row  ?></th>

			<th class="zalias"><?= $data [ 0 ]  ?></td>
			<th ><?= $data [ 1 ]  ?></td>
			<th ><?= $data [ 2 ]  ?></td>			
			<th class="zalias"><?= $$evar  ?></td>				
<?php			
			$row++;
?>
			</tr>
<?php
		}
		fclose ( $handle );
	}
?>	
</table>
</body>
</html>