<?php

namespace App\Models;

class request{

	private $header = [];

	public function getHeader(){
		return $this->header;
	}
	
	public function addHeader($key, $value){
		$this->header[$key] = $value;
	}
}