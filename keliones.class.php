<?php

	class Keliones {
	
		public 
			$mysqli
			, $res
			, $row
			, $debug = false
		;
	
		function __construct() {
		
			$this -> mysqli = new  mysqli (
			
				"localhost"
				, "root"
				, ""
				, "keliones"
			);
			$this -> mysqli -> set_charset ( "utf8" );
			
			if ( $this -> debug ) {
			
				if ( ! $this -> mysqli ) {
				
				    echo "Error: Unable to connect to MySQL." . PHP_EOL;
				    echo "Debugging errno: " . $this -> mysqli -> connect_errno() . PHP_EOL;
				    echo "Debugging error: " . $this -> mysqli  -> connect_error() . PHP_EOL;
				    exit;
				}

				echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
				echo "Host information: " . $this -> mysqli -> get_host_info( $this -> mysqli ) . PHP_EOL;
			}
		}
		
		public function prideti ( $fields_values ) {
		
			$fields = array_keys ( $fields_values );
			$values = array_values ( $fields_values ); 
			
			$qw_ins = 
					"
				INSERT INTO `keliones` (`" . implode ( '`, `', $fields ) . "` )
				VALUES (
					'" . implode ( "', '", $values ) . "'
				)
					";

			echo $qw_ins;

			$this -> res = $this -> mysqli -> query ( 
				$qw_ins 
			);
		}
		
		public function paiimti() {
		
			$this -> res = $this -> mysqli -> query ( 
					"
				SELECT SQL_CALC_FOUND_ROWS 
					`keliones`.*
				FROM 
					`keliones` 
					"
			);
		}
		
		public function fetchRow () {
			
			$iret = false;
		
			if ( $this -> row =  $this -> res -> fetch_assoc() ) {
			
				$iret = true;
			}
			return $iret;
		}
		
		public function close() {
		
			$this -> res -> free();		
			$this -> mysqli -> close ();	
		}
	}
