<?php

/**
*
*/
class Datatables extends FW_Controller
{

	function __construct(){
		parent::__construct();
	}
	private function numbers_keys($count=0){
		$send =array();
		for ($i=0; $i < $count; $i++) {
			$send[]=$i;
		}
		return $send;
	}

	public function change_keys_with_numb($data=array()){
		$n = count($data);
		$send =array();
		for ($i=0; $i < $n; $i++) {
			$count_val= count($data[$i]);
			$numb_keys= $this->numbers_keys($count_val);
			$send []  = array_combine($numb_keys, $data[$i]);
		}
		return $send;
	}
	public function export($data=array(),$type='json')
	{

		echo json_encode($data);
	}
}
