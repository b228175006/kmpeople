<?php 
	function p($arr){
		echo '<pre>'.print_r($arr,true).'</pre>';
	}
	function needadmin(){
		if ($_SESSION['admin']=='1') {
			$needadmin='style = "display:block-inline";';
		}else{
			$needadmin='style = "display:none";';
		}
		return $needadmin;
	}
 ?>