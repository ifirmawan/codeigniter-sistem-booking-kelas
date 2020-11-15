<?php
	
	function field_input($type='text')
	{
		$data['text'] 		= array('name','address','contact_handphone');
		$data['number']		= array();
		$data['date']		= array();
		$data['email']		= array();
		$data['password']	= array('contact_email');
		return (isset($data[$type]))? $data[$type] : array();
	}
	
	function field_textarea()
	{
		return array('address');
	}
	function field_select()
	{
		return array();
	}


?>