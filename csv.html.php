<!DOCTYPE html>
<?php

	$dir_file = __DIR__;

	$flag_import_begikai = false;

	$failo_vardas = $dir_file . '/LBMA-taure-2019.csv';
	$csv_delim = ",";
	
	if ( $flag_import_begikai  ) {
	
		include 'db_table.class.php';
		
		$begikai = new DbTable ( 'begikai' );
	}
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
	
		set_time_limit ( 0 );
	
		while ( ( $data = fgetcsv ( $handle, 0, $csv_delim ) ) !== FALSE ) {
		
			if ( $row > 3 ) {
		
				if ( $flag_import_begikai  ) {
		
		
					$fields_values = array (
					
						'vardas' => $begikai -> mysqli -> real_escape_string ($data [ 2 ] )
						, 'pavarde' => $begikai -> mysqli -> real_escape_string ( $data [ 3 ] )
						, 'miestas' => $begikai -> mysqli -> real_escape_string ( $data [ 4 ] )
						, 'klubas' => $begikai -> mysqli -> real_escape_string ( $data [ 5  ] )	
						, 'amzius' => intval ( $data [ 6 ] )
						, 'amz_grupe' => $begikai -> mysqli -> real_escape_string ( $data [ 7 ] )
					);
					
					if ( ! $begikai -> prideti ( $fields_values ) )  { 
					
						echo '</table>klaida eil.: ' . $row . '<br>';
						print_r ( $begikai -> mysqli -> error );
						exit;
					}
				}
			}
			
			$num = count ( $data );
?>	
			<tr><th><?= $row  ?></th>
<?php			
			$suma_tasku = 0;

			for ( $c=0; $c < $num; $c++ ) {
			
				if ( $c > 9  ) {
				
					$suma_tasku += intval ( $data [ $c ] );
				}
				if  ( $c < 16 ) {
?>			
					<td><?= $data [ $c ] ?></td>
<?php	
				}
			}
?>
					<td class="<?= ( ( $suma_tasku == intval ($data [ 8 ] ) ) ? 'zalias' : 'raudonas'  ) ?>"><?= $suma_tasku ?></td>
<?php			
			$row++;
?>
			</tr>
<?php
		}
		fclose($handle);
	}
	
	if ( $flag_import_begikai  ) {
	
		$begikai -> close();
	}
?>	
</table>
</body>
</html>