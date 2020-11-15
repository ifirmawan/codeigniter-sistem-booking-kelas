<?php

/*
 * Demo widget
 */
class Navigation extends Widget {

    public function display($data) {
        (isset($data['nav_model']))? $nav = $data['nav_model'] : $nav = 'nav_guest';	
        $this->view('widgets/'.$nav, $data);
    }
    
}