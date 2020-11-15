<?php
/**
*
*/
class Apps extends FW_Controller{

	function __construct(){
		parent::__construct();
		$this->logged_in_false();
		$this->setup_session();
		$this->setup_enqueue();
		$this->items['menu'] = $this->menu_user();
	}

	function setup_enqueue(){
		$this->set_css(array('bootstrap.min','sibuk.style'));
		$this->set_js(array('jquery-2.1.4','bootstrap.min','sibuk.program'));
		$this->data['render_css'] = $this->load_stylesheet();
		$this->data['render_js']  = $this->load_scriptjs();
		$this->load->vars($this->data);
	}
	
	function app_view($page='home',$data=array()){
		$data['menu_items'] = $this->items['menu'];
		$data['nav_model'] 	= 'nav_user';
		$this->render('pages/'.$page,$data);
	}

	function app_form($page='home',$data=array()){
		$data['menu_items'] = $this->items['menu'];
		$data['nav_model'] 	= 'nav_user';
		$this->render('form/'.$page,$data);
	}
	
	function menu_user(){
		$data['home']  = 'booking/index';
		$data['help']  = 'booking/help';
		return $data;
	}
	function back_up_ajukan(){
		$data['time'] 			= $this->room->get_available_status();
		if (is_null($this->session->userdata('booking'))) {
			$view 				= 'create-step-1';
		}else {
			$data['booking'] 	= $this->session->userdata('booking');
			$data['room']		= $this->room->get_by_id($data['booking']['book_room_id']);
			$data['fc_list']	= $this->room->get_facilities_by($data['booking']['book_room_id']);
			$view 				='create-step-'.$step;
		}
		$this->app_view($view,$data);
	}
	function back_up_initialize(){
		$data = $_POST;
		$this->validation->set_data($data); // register
    	$this->validation->required(array('book_use_for','book_room_id'), 'use for and time cannot empty !');
    	if ($this->validation->is_valid()) {
    		$user 					= $this->get_user_identity(); 
    		$data['book_mhs_id'] 	= $user['id'];
    		$data['book_support_id']= $this->room->get_support_by($data['book_room_id']);
    		if ($this->db->insert('booking_room',$data)) {
    			$data['id'] = $this->db->insert_id();
				$this->session->set_userdata('booking',$data);
    		}
    	}else{
    		$this->set_error_log($this->validation->get_error_message());
    	}
		redirect('booking/ajukan','refresh');
	}

	function back_up_plan(){
	
		if (!is_null($this->session->userdata('booking'))) {
			$booking 			= $this->session->userdata('booking');
			$room 				= get_detail_room($booking['book_room_id']);
			$room_name			= $room->room_name;
			$data['content'] 	= "<p>You're now booking room <strong>".$room_name."</strong></p>. <a href='".site_url('booking/ajukan')."' class='btn btn-primary'>Continue to configure</a>";
		}else{
			$item['list_day'] 	= $this->room->list_day();		
			$data['content']	= $this->load->view('form/create-book',$item,true);
		}
		$this->app_view('home',$data);

		
	}

}
