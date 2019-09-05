<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************School.php**********************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : School
 * @description     : Manage academic school.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class School extends MY_Controller {

    public $data = array();
    
    
    function __construct() {
        parent::__construct();
         $this->load->model('School_Model', 'school', true);
    }

    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Academic School List" user interface                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {
        
        check_permission(VIEW);
        
        $this->data['schools'] = $this->school->get_list('schools', array(), '','', '', 'id', 'ASC');
        $this->data['themes'] = $this->school->get_list('themes', array(), '','', '', 'id', 'ASC');
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_school'). ' | ' . SMS);
        $this->layout->view('school/index', $this->data);            
       
    }

    
    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Academic School" user interface                 
    *                    and store "Academic School" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);
        
        if ($_POST) {
            $this->_prepare_school_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_school_data();

                $insert_id = $this->school->insert('schools', $data);
                if ($insert_id) {
                    
                    create_log('Has been created a school : '.$data['school_name']);  
                    
                    success($this->lang->line('insert_success'));
                    redirect('administrator/school');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('administrator/school/add');
                }
            } else {
                $this->data = $_POST;
            }
        }

        $this->data['schools'] = $this->school->get_list('schools', array('status' => 1), '','', '', 'id', 'ASC');
        $this->data['themes'] = $this->school->get_list('themes', array(), '','', '', 'id', 'ASC');
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add'). ' ' . $this->lang->line('school'). ' | ' . SMS);
        $this->layout->view('school/index', $this->data);
    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Academic School" user interface                 
    *                    with populated "Academic School" value 
    *                    and update "Academic School" database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {   
        
        check_permission(EDIT);
       
        if ($_POST) {
            $this->_prepare_school_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_school_data();
                $updated = $this->school->update('schools', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                     create_log('Has been updated a school : '.$data['school_name']);  
                    
                    success($this->lang->line('update_success'));
                    redirect('administrator/school');                   
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('administrator/school/edit/' . $this->input->post('id'));
                }
            } else {
                 $this->data['school'] = $this->school->get_single('schools', array('id' => $this->input->post('id')));
            }
        } else {
            if ($id) {
                $this->data['school'] = $this->school->get_single('schools', array('id' => $id));
 
                if (!$this->data['school']) {
                     redirect('administrator/school');
                }
            }
        }

        $this->data['schools'] = $this->school->get_list('schools', array('status' => 1), '','', '', 'id', 'ASC');
        $this->data['themes'] = $this->school->get_list('themes', array(), '','', '', 'id', 'ASC');
        $this->data['edit'] = TRUE;       
        $this->layout->title($this->lang->line('edit'). ' ' . $this->lang->line('academic_school'). ' | ' . SMS);
        $this->layout->view('school/index', $this->data);
    }
    
    
        
        
    /*****************Function get_single_school**********************************
     * @type            : Function
     * @function name   : get_single_school
     * @description     : "Load single school information" from database                  
     *                    to the user interface   
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function get_single_school(){
        
       $school_id = $this->input->post('school_id');
       
       $this->data['school'] = $this->school->get_single('schools', array('id' => $school_id));
       echo $this->load->view('school/get-single-school', $this->data);
    }

    
    /*****************Function _prepare_school_validation**********************************
    * @type            : Function
    * @function name   : _prepare_school_validation
    * @description     : Process "Academic School" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_school_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
      
        $this->form_validation->set_rules('school_name', $this->lang->line('school') . ' ' . $this->lang->line('name'), 'trim|required|callback_school_name');
        $this->form_validation->set_rules('address', $this->lang->line('address'), 'trim|required');
        $this->form_validation->set_rules('phone', $this->lang->line('phone'), 'trim|required');
        $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|required');
        $this->form_validation->set_rules('currency', $this->lang->line('currency'), 'trim|required');
        $this->form_validation->set_rules('currency_symbol', $this->lang->line('currency_symbol'), 'trim|required');
        $this->form_validation->set_rules('session_start_month', $this->lang->line('session_start_month'), 'trim|required');
        $this->form_validation->set_rules('session_end_month', $this->lang->line('session_end_month'), 'trim|required');
        $this->form_validation->set_rules('footer', $this->lang->line('footer'), 'trim');
    }

            
    /*****************Function session_school**********************************
    * @type            : Function
    * @function name   : session_school
    * @description     : Unique check for "academic school" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function school_name() {
        if ($this->input->post('id') == '') {
            $school = $this->school->duplicate_check($this->input->post('school_name'));
            if ($school) {
                $this->form_validation->set_message('school_name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $school = $this->school->duplicate_check($this->input->post('school_name'), $this->input->post('id'));
            if ($school) {
                $this->form_validation->set_message('school_name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
    
    /*****************Function _get_posted_school_data**********************************
     * @type            : Function
     * @function name   : _get_posted_school_data
     * @description     : Prepare "Academic School" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */
    private function _get_posted_school_data() {

        $items = array();
        
        $items[] = 'school_code';
        $items[] = 'school_name';
        $items[] = 'address';
        $items[] = 'phone';
        $items[] = 'email';
        $items[] = 'currency';
        $items[] = 'currency_symbol';
        $items[] = 'school_fax';
        $items[] = 'school_lat'; 
        $items[] = 'school_lng'; 
        $items[] = 'session_start_month';
        $items[] = 'session_end_month';
        $items[] = 'enable_frontend';
        $items[] = 'final_result_type';
        $items[] = 'footer';
        $items[] = 'theme_name';
        $items[] = 'facebook_url';
        $items[] = 'twitter_url';
        $items[] = 'linkedin_url';
        $items[] = 'google_plus_url';
        $items[] = 'youtube_url';
        $items[] = 'instagram_url';
        $items[] = 'pinterest_url';
        
        $data = elements($items, $_POST);     
       
        $data['registration_date'] = date('Y-m-d H:i:s', strtotime($this->input->post('registration_date')));
        
        if ($this->input->post('id')) {
            $data['status'] = $this->input->post('status');
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            
            $data['about_text'] = 'Lorem ipsum dolor sit amet, consecte- tur adipisicing elit, We create Premium WordPress themes & plugins for more than three years. ';
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }
        
        if ($_FILES['logo']['name']) {
            $data['logo'] = $this->_upload_logo();
        }

        return $data;
    }
    
    
            
    /*****************Function _upload_logo**********************************
    * @type            : Function
    * @function name   : _upload_logo
    * @description     : Process to upload institute logo in the server                  
    *                     and return logo name   
    * @param           : null
    * @return          : $logo string value 
    * ********************************************************** */
    private function _upload_logo() {

        $prevoius_logo = @$_POST['logo_prev'];
        $logo_name = $_FILES['logo']['name'];
        $logo_type = $_FILES['logo']['type'];
        $logo = '';


        if ($logo_name != "") {
            if ($logo_type == 'image/jpeg' || $logo_type == 'image/pjpeg' ||
                    $logo_type == 'image/jpg' || $logo_type == 'image/png' ||
                    $logo_type == 'image/x-png' || $logo_type == 'image/gif') {

                $destination = 'assets/uploads/logo/';

                $file_type = explode(".", $logo_name);
                $extension = strtolower($file_type[count($file_type) - 1]);
                $logo_path = time().'-school-logo.' . $extension;

                copy($_FILES['logo']['tmp_name'], $destination . $logo_path);

                if ($prevoius_logo != "") {
                    // need to unlink previous image
                    if (file_exists($destination . $prevoius_logo)) {
                        @unlink($destination . $prevoius_logo);
                    }
                }

                $logo = $logo_path;
            }
        } else {
            $logo = $prevoius_logo;
        }

        return $logo;
    }

    
    
    /*****************Function delete**********************************
   * @type            : Function
   * @function name   : delete
   * @description     : delete "Academic School" from database                  
   *                       
   * @param           : $id integer value
   * @return          : null 
   * ********************************************************** */
    public function delete($id = null) {
        
        
        check_permission(DELETE);
        
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('administrator/school');              
        }
        
        // need to find all child data from database
        if(!true){
            error($this->lang->line('pls_remove_child_data'));
            redirect('administrator/school');
        }
        
        $school = $this->school->get_single('schools', array('id' => $id));
        
        if ($this->school->delete('schools', array('id' => $id))) {

            create_log('Has been deleted a school : '.$school->school_name);  
            success($this->lang->line('delete_success'));
            
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('administrator/school');
    }

}
