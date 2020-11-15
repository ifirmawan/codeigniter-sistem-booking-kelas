<?php
/**
*
*/
class Manage extends FW_Controller{
	protected $alih;
	function __construct(){
		parent::__construct();
		$this->logged_in_false();
		$this->setup_session();
		$this->setup_navigation();
		$this->setup_enqueue();
		$this->is_forbidden();
		$this->alih = array('yes'=>'no','no'=>'yes','1'=>'0','0'=>'1');
		$this->load->library('email');
	}
	
	function setup_navigation($data=array())
	{

		$nav['nav_model'] 	= 'nav_user';
		$this->items['menu'] = $this->admin_menu();
		$nav['menu_items']	= $this->items['menu'];
		$data['navbar_top'] = $this->template->widget('navigation',$nav);
		$this->load->vars($data);
	}
	
	function setup_enqueue(){
		$this->set_css(array('bootstrap.min','sibuk.style'));
		$this->set_js(array('jquery-2.1.4','bootstrap.min'));
		$data['render_css'] = $this->load_stylesheet();
		$data['render_js']  = $this->load_scriptjs();
		$this->load->vars($data);
	}

	function admin_menu()
	{
		$data['home'] 		= 'admin/index';
		$data['rooms'] 		= 'admin/room';
		$data['supports']	= 'admin/petugas';
		//email-tpl-v1.php
		return $data;
	}

	function send_email($to='',$message='',$room=''){
		if ($to && $message && $room) {
			$subject='[booking-'.$room.'] Please Give this code!';
			$this->email->from('firmawaneiwan@gmail.com', 'Admin Sibukapp');
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($message);
			return $this->email->send();
			//$this->email->print_debugger();
			exit;
		}else{
			return false;
		}
	}

	function switch_to($table='',$id=false)
	{
		$entity_data = $this->db->get_where($table,array('id'=>$id))->row();
		if (!is_null($entity_data)) {
			$this->db->where('id',$id);
			if ($this->db->update($table,array('data_status'=>$this->alih[$entity_data->data_status]))) {
				return true;	
			}
		}
		return false;
	}
	function is_forbidden()
	{
		if ($this->get_user_role()!='adm') {
			redirect('booking/index','refresh');
		}
	}

	function admin_view($page='',$data=array()){
		$data['menu_items'] = $this->items['menu'];
		$data['nav_model'] 	= 'nav_user';
		$this->render('admin/'.$page,$data);
	}
	
}
