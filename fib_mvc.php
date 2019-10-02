<?php

	include 'fibonacio_seka.class.php';
	
	$fibonacio_seka = new fibonacioSeka ( 1, 1 );
	$fibonacio_seka -> generuoti ( 20 );

	include 'fibonacio_seka.html.php';