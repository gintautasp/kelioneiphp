<?php

	class SiulomosKeliones {
	
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
		
		public function paiimti() {
		
			$this -> res = $this -> mysqli -> query ( 
					"
				SELECT SQL_CALC_FOUND_ROWS 
					`keliones`.*
				FROM 
					`keliones` 
				LEFT JOIN 
					`klientai_keliones` ON ( 
							`keliones`.`id`=`klientai_keliones`.`keliones_id`
						AND 
							`klientai_keliones`.`klientai_id`=1
					) 
				LEFT JOIN `klientai` ON ( 

					`klientai`.`id`=1
				) 
				WHERE 
						`klientai_keliones`.`id` IS NULL
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
