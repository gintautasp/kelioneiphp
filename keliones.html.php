<!DOCTYPE html>
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
		label.chbx {
			display: inline-block;
		}
	</style>
</head>
<body>
<h1> Kelionės</h1>
<form method="post" action="">
		<label for="pav">Pavadinimas</label>
		<input type="text" id="pav" name="pav" value="">
		<label for="apras">Aprašymas</label>
		<textarea id="apras" name="apras"></textarea>
		<div>
			<input type="checkbox" id="flag_poilsines" name="flag_poilsines" value="1">
				<label  class="chbx" for="flag_poilsines"> - poilsinės</label>
		</div>
		<div>
			<input type="checkbox" id="flag_pazintines" name="flag_pazintines" value="1">
				<label class="chbx" for="flag_pazintines"> - pažintines </label>
		</div>
		<div>			
		<input type="checkbox" id="flag_viskas_isk" name="flag_viskas_isk" value="1">			
			<label class="chbx" for="flag_viskas_isk"> - viskas įsk. </label>
		</div>
		<div>			
			<input type="checkbox" id="flag_laisv_pasir" name="flag_laisv_pasir" value="1">		
				<label class="chbx" for="flag_laisv_pasir"> - laisv. pasir.</label>
		</div>				
		<!-- label for="akcijos_id"></label -->
		<input type="submit" name="saugoti" value="saugoti">
</form>
<table>
	<tr>
		<th>id</th>
		<th>pavadinimas</th>
		<th>aprašymas</th>
		<th>flag<br>poilsines</th>
		<th>flag<br>pažintines</th>
		<th>flag<br>viskas<br>isk</th>
		<th>flag<br>laisv.<br>pasir.</th>
		<th>akcijos<br>id</th>
	</tr>
<?php		

	$keliones -> paiimti();
	
	if ( $keliones -> res ) {

		/* fetch associative array */
		while ( $keliones -> fetchRow() ) {
		
			db_row_html ( $keliones -> row );
		}

		/* free result set */
		$keliones -> close();
	}
?>	
</table>
</body>
</html>