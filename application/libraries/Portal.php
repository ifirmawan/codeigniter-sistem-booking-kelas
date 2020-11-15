<?php
/**
*
*/
class Portal extends FW_Controller{

	function __construct()
	{
		parent::__construct();
		$this->setup_enqueue();
		$this->setup_navigation();
		$this->logged_in_true();
	}


	function setup_enqueue(){
		$this->set_css(array('bootstrap.min'));
		$this->set_js(array('jquery-2.1.4','bootstrap.min'));
		$this->data['render_css'] = $this->load_stylesheet();
		$this->data['render_js']	= $this->load_scriptjs();
		$this->load->vars($this->data);
	}
	function setup_navigation(){
		$this->set_guest_menu();
		$nav['menu_items']	= $this->items['menu'];
		$data['nav_model']  = 'nav_guest';
		$data['navbar_top'] = $this->template->widget('navigation',$nav);
		$this->load->vars($data);
	}
	function setup_guest_room(){
		$this->grocery->set_table('room');
        $this->grocery->where('data_status','yes');
		$this->grocery->unset_delete();
        $this->grocery->unset_edit();
        $this->grocery->unset_add();
        $this->grocery->unset_export();
        $this->column_room();
	}
	
	function set_guest_menu($custom=array())
	{
		$menu['home'] = 'guest/index';
		$menu['help'] = 'guest/help';
		if ($custom) {
			$menu = array_merge($menu,$custom);
		}
		$this->items['menu'] = $menu;
	}

	function forgot_password_view($data=array()){

		$this->template->content->view('form/forgot_password', $data);
       	$this->template->publish();
	}

	

}
