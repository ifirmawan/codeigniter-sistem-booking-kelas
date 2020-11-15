<?php
/**
* 
*/
class Account extends Apps
{
	
	function __construct()
	{
		parent::__construct();
	}
	function out(){
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();		
		redirect('login');
	}
	
}