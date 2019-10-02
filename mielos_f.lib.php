<?php
	/**
	* [C]omplex [F]ield [I]f [H]as [O]r [D]efault
	*/
	function _cfihod ( $complex, $field, $default ) {
	
		$ret_val = $default;
	
		if ( isset ( $complex [ $field ] ) ) {
		
			$ret_val = $complex [ $field ];
		}
		return $ret_val;
	}