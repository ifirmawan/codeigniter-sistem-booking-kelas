<?php
define('JS_PATH', base_url().'assets/js/');
define('CSS_PATH', base_url().'assets/css/');

function get_detail_room($id=''){
	$ci 	= &get_instance();
	return $ci->room->get_by_id($id);
}
function get_support_name($id=''){
	$ci 	= &get_instance();
	if($data = $ci->db->get_where('petugas',array('id'=>$id))->row()){
		return $data->support_name;
	}
}

function get_support_email($id=''){
	$ci 	= &get_instance();
	if($data = $ci->db->get_where('petugas',array('id'=>$id))->row()){
		return $data->support_email;
	}
}

function get_time_by($day=''){
	if (!empty($day)) {
		$ci 	= &get_instance();
		$data 	= $ci->db->get_where('room',array('room_available_day'=>$day,'data_status'=>'yes'));
		if ($data->num_rows() > 0 ) {		
			return $data->result_array();
		}
	}
	return false;
}

function get_detail_mhs($id=''){
	$ci 	= &get_instance();
	if ($user = $ci->db->get_where('mahasiswa',array('id'=>$id))->result_array()) {
		return $user;
	}
}

function timeleft($time=false){
		$time = trim($time);
		if ($time) {
			$time1 = new DateTime($time); // string date
			$time2 = new DateTime('now');
			//$time2->setTimestamp(1327560334); // timestamps,  it can be string date too.
			$interval =  $time2->diff($time1);
			return $interval->format("%H hours : %i minutes : %s s");
		}else{
			return 0;
		}
}
?>