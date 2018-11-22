<?php
function getItems($key=""){
	if(!$key) return false;
	$pos = strpos($key, '.');
	$posA = strpos($key, '-');

	if($pos !== false){

		list($keys,$sub) = explode('.', $key);
		$data = config_item($keys);
		if(isset($data->{$sub})){
			return $data->{$sub};
		}
		
	}else if($posA !== false){

		list($keys,$sub) = explode('-', $key);
		$data = config_item($keys);
		if(isset($data[$sub])){
			return $data[$sub];
		}

	}else{
		return config_item($key);
	}

}
?>