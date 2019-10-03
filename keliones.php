<?php

	include 'mielos_f.lib.php';
	include 'keliones.class.php';
	
	print_r ( $_POST );

	$keliones = new Keliones();
	
	if ( _cfihod ( $_POST, 'saugoti', 'nesaugoti' ) == 'saugoti' ) {
		
		unset ( $_POST [ 'saugoti' ] );
	
		$keliones -> prideti ( $_POST );
	}
	
	include 'keliones.html.php';