<?php

	class FibonacioSeka {
	
		public $seka = array();
		
		public $iki_kiek, $kuri_reiksme;
		
		function __construct( $pirma_reiksme, $antra_reiksme ) {
		
			if ( is_numeric ( $pirma_reiksme ) ) { 
			
				$this -> seka[] = $pirma_reiksme; 
				
			} else {
			
				$this -> seka[] = 1;
			}
			
			if ( is_numeric ( $antra_reiksme ) ) { 			
			
				$this -> seka[] = $antra_reiksme;
				
			} else {
			
				$this -> seka[] = 1;
			}
		}
		
		public function generuoti ( $iki_kiek ) {
		
			$i = 2;
			
			if ( is_numeric ( $iki_kiek ) ) {
			
				$this -> iki_kiek = intval ( $iki_kiek );
				
			} else {
			
				$this -> iki_kiek = 20;
			}
		
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
		
		public function start() {
		
			$this -> kuri_reiksme = -1;
		}
		
		public function takeNext() {
		
			$this -> kuri_reiksme++;
			
			return $this -> kuri_reiksme <= $this -> iki_kiek;
		}
		
		public function kokiaDabarReiksme () {		
			
			return $this -> kokiaReiksme ( $this -> kuri_reiksme + 1 );
		}
	}
	
