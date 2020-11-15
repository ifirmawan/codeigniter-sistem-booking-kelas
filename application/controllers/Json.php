<?php

/**
* 
*/
class Json extends Datatables
{
	
	function __construct()
	{
		parent::__construct();
	}
	function jqtable($table='room')
	{
		$data['draw'] 				= 1;
		$data['recordsTotal'] 		= 3;
		$data['recordsFiltered'] 	= 3;
		$data['data']				= array();
		if ($query = $this->db->get($table)->result_array()) {
			$data['data'] = $this->change_keys_with_numb($query);
		}
		$this->export($data);
	}
	
	function check_use($for=''){
		$data 			= $_POST;
		$send['sts'] 	= 0;
		$this->validation->set_data($data);
    	$this->validation->required(array('id_booking','id_fc'), 'internal server error');
    	$send['msg'] 	= $this->validation->get_error_message();
    	if ($this->validation->is_valid()) {
    		switch ($for) {
    			case 'update':
    				if ($this->db->update('booking_room_fc'
    							,array(
    									'data_status'=>$data['data_status']
    								)
    							,array(
    							'id_booking'=>$data['id_booking']
    							,'id_fc'=>$data['id_fc']
    						)
    					)) {
    					$send['sts'] = 1;
    					$send['msg'] ='success delete';
    				}
    				break;
    			
    			case 'del':
    				if ($this->db->delete('booking_room_fc',$data,array('id_booking'=>$data['id_booking'],'id_fc'=>$data['id_fc']))) {
    					$send['sts'] = 1;
    					$send['msg'] ='success delete';
    				}
    				break;
    			case 'add':
    				if ($this->db->insert('booking_room_fc',$data)) {
    					$send['sts'] = 1;
    					$send['msg'] ='success add item';
    				}
    				break;
    		}
    	}
		return  $this->export($send);
	}

	function time($left=''){
		echo (empty($left))? date('h:i:s') : timeleft($left);
	}
}