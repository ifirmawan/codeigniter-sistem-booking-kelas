<?php

/**
* 
*/
class User extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function verify($uname=false,$pass=false){		
		$pass 			= sha1($pass);
		$q_user_mhs		= $this->get_row_by('mahasiswa',array('user_email'=>$uname,'user_password'=>$pass));
		$q_user_admin	= $this->get_row_by('admin',array('admin_email'=>$uname,'admin_password'=>$pass));
		$send['table']	= '';
		$send['data']	= array();
		if (!is_null($q_user_mhs)) {
			$send['table']	= 'mhs';
			$send['data'] = (array)$q_user_mhs;
		}elseif (!is_null($q_user_admin)) {
			$send['table'] ='adm';
			$send['data']  = (array)$q_user_admin;
		}
		return $send;
	}

	function get_row_by($table='',$where=array()){
		return $this->db->get_where($table,$where)->row();
	}
	
}