<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Member.php**********************************
 * @product name    : Multi School Management System 
 * @type            : Class
 * @class name      : Member
 * @description     : Manage transport member of the school.  
 * @author          : Mubashir 	
 * @url             : http://facebook.com/mubashir.p      
 * @support         : pro.mubashir@outlook.com	
 * @copyright       : Mubashir	 	
 * ********************************************************** */

class Member extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Member_Model', 'member', true);        
        
    }

        
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Transport Member List" user interface                 
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function index() {

        check_permission(VIEW);
        
        $this->data['members'] = $this->member->get_transport_member_list($is_transport_member = 1);
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('transport') . ' ' . $this->lang->line('member') . ' | ' . SMS);
        $this->layout->view('member/index', $this->data);
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Transport Member" user interface                 
    *                     
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);

        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id'); 
            $this->data['routes'] = $this->member->get_list('routes', $condition);     
        }        
        
        $this->data['non_members'] = $this->member->get_transport_member_list($is_transport_member = 0);
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('transport') . ' ' . $this->lang->line('non_member') . ' | ' . SMS);
        $this->layout->view('member/index', $this->data);
    }

        
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Transport Member" data from database                  
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {

        check_permission(DELETE);

        if(!is_numeric($id)){
           error($this->lang->line('unexpected_error'));
           redirect('transport/member/index');
        }
        
        $member = $this->member->get_single('transport_members', array('id' => $id));
        if ($this->member->delete('transport_members', array('id' => $id))) {

            $this->member->update('students', array('is_transport_member' => 0), array('user_id' => $member->user_id));

            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('transport/member/index');
    }


   
    /*****************Function add_to_transport**********************************
    * @type            : Function
    * @function name   : add_to_transport
    * @description     : Process to save Transport member info into database                  
    *                       
    * @param           : null
    * @return          : boolean true/flase 
    * ********************************************************** */
    public function add_to_transport() {

        $school_id = $this->input->post('school_id');
        $user_id = $this->input->post('user_id');
        $route_id = $this->input->post('route_id');
        $stop_id = $this->input->post('stop_id');

        if ($user_id) {

            $member = $this->member->get_single('transport_members', array('user_id' => $user_id, 'school_id'=>$school_id));
            if (empty($member)) {

                $data['school_id'] = $school_id;
                $data['user_id'] = $user_id;
                $data['route_id'] = $route_id;
                $data['route_stop_id'] = $stop_id;
                $data['status'] = 1;
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['created_by'] = logged_in_user_id();

                $insert_id = $this->member->insert('transport_members', $data);
                $this->member->update('students', array('is_transport_member' => 1), array('user_id' => $user_id, 'school_id'=>$school_id));
                echo TRUE;
            } else {
                echo FALSE;
            }
        } else {
            echo FALSE;
        }
    }
    
    
            
    /*****************Function get_route_by_school**********************************
     * @type            : Function
     * @function name   : get_route_by_school
     * @description     : Load "Route Listing" by ajax call                
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_route_by_school() {
        
        $school_id  = $this->input->post('school_id');
        $user_id  = $this->input->post('user_id');
         
        $routes = $this->member->get_list('routes', array('status'=>1, 'school_id'=>$school_id), '','', '', 'id', 'ASC'); 
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        if (!empty($routes)) {
            foreach ($routes as $obj) { 
                $vehicle = get_vehicle_by_ids($obj->vehicle_ids);
                $str .= '<option value="' . $obj->id . '" >' . $obj->title . '['.$vehicle.']</option>';                
            }
        }

        echo $str;
    }
    
    
        
    /**     * *************Function get_bus_stop_by_route**********************************
     * @type            : Function
     * @function name   : get_bus_stop_by_route
     * @description     : this function used to populate bus stop list by route  
      for user interface
     * @param           : null 
     * @return          : $str string value with room list 
     * ********************************************************** */
    public function get_bus_stop_by_route() {

        $school_id = $this->input->post('school_id');
        $route_id = $this->input->post('route_id');

         $school = $this->member->get_school_by_id($school_id);
         
        $stops = $this->member->get_list('route_stops', array('status' => 1, 'route_id' => $route_id, 'school_id'=>$school_id), '', '', '', 'id', 'ASC');
        $str = '<option value="">-- ' . $this->lang->line('select') . ' ' . $this->lang->line('bus_stop') . ' --</option>';
        $selected = '';
        if (!empty($stops)) {
            foreach ($stops as $obj) {
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->stop_name . ' [' . $school->currency_symbol .$obj->stop_fare . ']</option>';
            }
        }

        echo $str;
    }
    

}
