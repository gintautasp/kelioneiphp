<?php

	class Keliones {
	
		public 
			$mysqli
			, $res
			, $res1
			, $row
			, $debug = false
			, $act1
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
		
		public function emptyAct1 () {
		
			$this -> act1 = array (
			
				'id' => 0
				, 'pav' => ''
				, 'apras' => ''
				, 'flag_poilsines' => 0
				, 'flag_pazintines' => 0
				, 'flag_viskas_isk' => 0
				, 'flag_laisv_pasir' => 0
				
			);
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
		
		public function pakeisti ( $fields_values ) {
		
			$sets = array();
		
			foreach ( $fields_values as $field => $value ) {
			
				if ( $field != 'id' ) {
			
					$sets[] = "`" . $field . "`='" . $value . "'"; 
				}
			}
			
			$qw_upd = 
					"
				UPDATE `keliones` 
				SET
					" . implode ( ', ', $sets ) . "
				WHERE
					`id`=" . $fields_values [ 'id' ] . "
					";

			echo $qw_upd;

			$this -> res = $this -> mysqli -> query ( 
				$qw_upd 
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
		
		public function paiimti1( $id ) {
		
			$qw_get1 =
					"
				SELECT SQL_CALC_FOUND_ROWS 
					`keliones`.*
				FROM 
					`keliones`
				WHERE
					`id`=" . intval ( $id ) . "
					";
			echo $qw_get1;
			$this -> res1 = $this -> mysqli -> query ( $qw_get1 );
			
			return 
				$this -> act1  = $this ->res1 -> fetch_assoc()
				;
		}
		
		public function ismesti ( $id ) {
		
			$qw_get1 =
					"
				DELETE
				FROM 
					`keliones`
				WHERE
					`id`=" . intval ( $id ) . "
					";
			echo $qw_get1;
			$this -> res1 = $this -> mysqli -> query ( $qw_get1 );
			
			header ( 'Location: http://' . $_SERVER [ 'SERVER_NAME' ] );
				;		
		
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
