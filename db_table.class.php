<?php

	class DbTable {
	
		public 
			$mysqli
			, $res
			, $res1
			, $row
			, $debug = false
			, $act1
			, $table = 'test'
		;
	
		function __construct ( $table ) {
		
			$this -> table = $table;
		
			$this -> mysqli = new  mysqli (
			
				"localhost"
				, "root"
				, ""
				, "lbma"
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
		}
		
		public function prideti ( $fields_values ) {
		
			$fields = array_keys ( $fields_values );
			$values = array_values ( $fields_values ); 
			
			$qw_ins = 
					"
				INSERT INTO `" . $this -> table . "` (`" . implode ( '`, `', $fields ) . "` )
				VALUES (
					'" . implode ( "', '", $values ) . "'
				)
					";
																						// echo $qw_ins;

			$this -> res = $this -> mysqli -> query ( $qw_ins );
			
			return $this -> res; 
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
				UPDATE `" . $this -> table . "` 
				SET
					" . implode ( ', ', $sets ) . "
				WHERE
					`id`=" . $fields_values [ 'id' ] . "
					";

																							// echo $qw_upd;
			$this -> res = $this -> mysqli -> query ( 
				$qw_upd 
			);
		}		
		
		public function paiimti() {
		
			$this -> res = $this -> mysqli -> query ( 
					"
				SELECT SQL_CALC_FOUND_ROWS 
					`" . $this -> table . "`.*
				FROM 
					`" . $this -> table . "` 
					"
			);
		}
		
		public function paiimti1( $id ) {
		
			$qw_get1 =
					"
				SELECT SQL_CALC_FOUND_ROWS 
					`" . $this -> table . "`.*
				FROM 
					`" . $this -> table . "`
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
					`" . $this -> table . "`
				WHERE
					`id`=" . intval ( $id ) . "
					";
																							// echo $qw_get1;
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
