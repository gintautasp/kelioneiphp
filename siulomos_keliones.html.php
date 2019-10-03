<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Siūlomos kelionės
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
<h1> Siūlomos kelionės</h1>
<table>
	<tr>
		<th>id</th>
		<th>pav</th>
		<th>apras</th>
		<th>flag_poilsines</th>
		<th>flag_pazintines</th>
		<th>flag_viskas_isk</th>
		<th>flag_laisv_pasir</th>
		<th>akcijos_id</th>
	</tr>
<?php		

	$siulomos_keliones -> paiimti();
	
	if ( $siulomos_keliones -> res ) {

		/* fetch associative array */
		while ( $siulomos_keliones -> fetchRow() ) {
		
			db_row_html ( $siulomos_keliones -> row );
		}

		/* free result set */
		$siulomos_keliones -> close();
	}
?>	
</table>
</body>
</html>