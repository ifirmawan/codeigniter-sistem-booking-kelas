<?php
/**
* 
*/
class Room extends FW_Model
{
	
	function __construct()
	{
		parent::__construct('room');
	}
	function get_available_status($value='yes'){
		return $this->get_where(array('data_status'=>$value));
	}
	
	function get_facilities_by($id=''){
		return $this->db->get_where('room_fasilities',array('fc_room_id'=>$id))->result_array();
	}
	function get_support_by($id='')
	{
		if ($data = $this->get_by_id($id)) {
			return $data->room_support_id;
		}
	}
	function list_day(){
		return $this->get_enum_values('room_available_day');
	}
	function available_day()
	{
		$query = $this->db->query('SELECT DISTINCT room_available_day FROM room WHERE data_status="yes"');
		return $query->result_array();
	}
	function get_by_day($day=''){
		return $this->db->get_where('room',array('data_status'=>'yes','room_available_day'=>$day))->result_array();
	}
}
