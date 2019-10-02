<?php

	include 'mielos_f.lib.php';
	include 'fibonacio_seka.class.php';
	
	$fibonacio_seka = new fibonacioSeka ( _cfihod ( $_GET, 'pirma_reiksme', 1 ) , _cfihod ( $_GET, 'antra_reiksme',  1 ) );
	$fibonacio_seka -> generuoti ( _cfihod ( $_GET, 'kiek_reiksmiu', 20 ) );

	include 'fibonacio_seka.html.php';