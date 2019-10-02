<?php

	class FibonacioSeka {
	
		public $seka = array();
		
		public $iki_kiek, $kuri_reiksme;
		
		function __construct( $pirma_reiksme, $antra_reiksme ) {
			
			$this -> seka[] = $pirma_reiksme; 
			$this -> seka[] = $antra_reiksme;
		}
		
		public function generuoti ( $iki_kiek ) {
		
			$i = 2;
			
			$this -> iki_kiek = $iki_kiek;
		
			while ( $i < $iki_kiek  ) { 
			
				$this -> seka[] = $this -> seka [ $i - 2 ]  + $this -> seka [ $i  - 1 ];
				$i++;
			}
		}
		
		public function kokiaReiksme ( $nr, $print = false ) { 
		
			$re = false;
			
			if ( $nr < $this -> iki_kiek ) {
			
				$re = $this ->seka [ $nr - 1 ]; 
			}
			
			 if ( $print ) {
			 
				echo $re;
				
			} else {
			
				return $re;
			}
		}
		
		public start() {
		
			$this -> kuri_reiksme = -1;
		}
		
		public takeNext() {
		
			$this -> kuri_reiksme++;
			
			return $this -> kuri_reiksme < $this -> iki_kiek;
		}
		
		public function kokiaDabarReiksme () {		
			
			return $this -> kokiaReiksme ( $this -> kuri_reiksme );
		}
	}
	
