<?php

	include 'mielos_f.lib.php';
	include 'keliones.class.php';
	
									// print_r ( $_POST );

	$keliones = new Keliones();
	
	if ( _cfihod ( $_POST, 'saugoti', 'nesaugoti' ) == 'saugoti' ) {
		
		unset ( $_POST [ 'saugoti' ] );
	
		if ( intval ( _cfihod ( $_POST, 'id', 0 ) ) == 0 ) {
	
			$keliones -> prideti ( $_POST );
			
		} else {
			
			$keliones -> pakeisti ( $_POST );
		}
	}
	
	if ( ( $id = intval ( _cfihod ( $_GET, 'id', 0 ) ) ) > 0 ) {
		
		if ( intval ( _cfihod ( $_GET, 'del', 0 ) ) == 1 ) {
		
			$keliones -> ismesti ( $id );
			
		} else {
		
			$keliones -> paiimti1( $id );
		}
	}
	
	include 'keliones.html.php';