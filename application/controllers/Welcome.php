<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Welcome.php**********************************
 * @product name    : Multi School Management System 
 * @type            : Class
 * @class name      : Welcome
 * @description     : This is default class of the application.  
 * @author          : Mubashir 	
 * @url             : http://facebook.com/mubashir.p      
 * @support         : pro.mubashir@outlook.com	
 * @copyright       : Mubashir	 	
 * ********************************************************** */

class Welcome extends CI_Controller {
    /*     * **************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : this function load login view page            
     * @param           : null; 
     * @return          : null 
     * ********************************************************** */
    public $global_setting = array();
    public function index() {
       
        if (logged_in_user_id()) {
            redirect('dashboard');
        }
                
        $this->global_setting = $this->db->get_where('global_setting', array('status'=>1))->row();
        $this->load->view('login');
    }

}
