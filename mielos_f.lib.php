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
	
	function db_row_html ( $row ) {
?>
			<tr>
<?php	
		foreach ( $row as $name => $value ) {

			$val_to_show = $value;
			
			if ( strpos ( $name, 'flag_' ) !== false ) {
			
				$val_to_show = '&#x2610;';
		
				if ( intval ( $value ) > 0 )  {
					
					$val_to_show  = '&#x2611;';
				} 
			}
?>
			<td><?= $val_to_show ?></td>
<?php
		}
?>
		</tr>
<?php		
	}