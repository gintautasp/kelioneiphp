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
<span class="zalias">
<?php
	
	echo 'Labas PHP pasauli';
?>
</span>
<span class="raudonas">
<?php
	
	echo ' Labas raudonas PHP pasauli';
?>
</span>
<h1> fibonačio seka</h1>
<table>
	<tr> <th> nr. </th><th> reikšmė</th></tr>
	<tr><td>1</td><td>1</td></tr>
	<tr><td>2</td><td>2</td></tr>
<?php
	$re_2 = 1; $re_1 = 1; $kiek = 20; $i = 3;
	
	while ( $i <= $kiek ) { 
	
		$re = $re_2 + $re_1;
?>
		<tr><td><?= $i ?></td><td><?= $re ?></td></tr>
<?php
		$re_2 = $re_1;
		$re_1 = $re;
		$i++;
	}
?>	
</table>
</body>
</html>