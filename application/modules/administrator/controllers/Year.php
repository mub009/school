<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Year.php**********************************
 * @product name    : Multi School Management System 
 * @type            : Class
 * @class name      : Year
 * @description     : Manage academic year.  
 * @author          : Mubashir 	
 * @url             : http://facebook.com/mubashir.p      
 * @support         : pro.mubashir@outlook.com	
 * @copyright       : Mubashir	 	
 * ********************************************************** */

class Year extends MY_Controller {

    public $data = array();
    
    
    function __construct() {
        parent::__construct();
         $this->load->model('Year_Model', 'year', true);
    }

    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Academic Year List" user interface                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {
        
        check_permission(VIEW);
        
        $this->data['years'] = $this->year->get_year_list();
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_academic_year'). ' | ' . SMS);
        $this->layout->view('year/index', $this->data);            
       
    }

    
    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Academic Year" user interface                 
    *                    and store "Academic Year" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);
        
        if ($_POST) {
            $this->_prepare_year_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_year_data();

                $insert_id = $this->year->insert('academic_years', $data);
                if ($insert_id) {
                    
                     create_log('Has been created a academic Year : '.$data['session_year']);   
                    
                    success($this->lang->line('insert_success'));
                    redirect('administrator/year/index');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('administrator/year/add');
                }
            } else {
                $this->data = $_POST;
            }
        }

        $this->data['years'] = $this->year->get_year_list();
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add'). ' ' . $this->lang->line('academic_year'). ' | ' . SMS);
        $this->layout->view('year/index', $this->data);
    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Academic Year" user interface                 
    *                    with populated "Academic Year" value 
    *                    and update "Academic Year" database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {   
        
        check_permission(EDIT);
       
        if ($_POST) {
            $this->_prepare_year_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_year_data();
                $updated = $this->year->update('academic_years', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been updated a academic Year : '.$data['session_year']);  
                    
                    success($this->lang->line('update_success'));
                    redirect('administrator/year/index');                   
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('administrator/year/edit/' . $this->input->post('id'));
                }
            } else {
                 $this->data['year'] = $this->year->get_single('academic_years', array('id' => $this->input->post('id')));
            }
        } else {
            if ($id) {
                $this->data['year'] = $this->year->get_single('academic_years', array('id' => $id));
 
                if (!$this->data['year']) {
                     redirect('administrator/year/index');
                }
            }
        }
        
      
        $this->data['school_id'] = $this->data['year']->school_id;
        
        $this->data['years'] = $this->year->get_year_list();
        $this->data['edit'] = TRUE;       
        $this->layout->title($this->lang->line('edit'). ' ' . $this->lang->line('academic_year'). ' | ' . SMS);
        $this->layout->view('year/index', $this->data);
    }

    
    /*****************Function _prepare_year_validation**********************************
    * @type            : Function
    * @function name   : _prepare_year_validation
    * @description     : Process "Academic Year" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_year_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
        $this->form_validation->set_rules('session_year', $this->lang->line('academic_year'), 'trim|required|callback_session_year');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
    }

            
    /*****************Function session_year**********************************
    * @type            : Function
    * @function name   : session_year
    * @description     : Unique check for "academic year" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function session_year() {
        if ($this->input->post('id') == '') {
            $year = $this->year->duplicate_check($this->input->post('session_year'), $this->input->post('school_id'));
            if ($year) {
                $this->form_validation->set_message('session_year', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $year = $this->year->duplicate_check($this->input->post('session_year'), $this->input->post('school_id'), $this->input->post('id'));
            if ($year) {
                $this->form_validation->set_message('session_year', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
    
    /*****************Function _get_posted_year_data**********************************
     * @type            : Function
     * @function name   : _get_posted_year_data
     * @description     : Prepare "Academic Year" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */
    private function _get_posted_year_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'session_year';
        $data = elements($items, $_POST);     
        $data['note'] = $this->input->post('note');
        
        $arr = explode('-', $data['session_year']);
        $data['start_year'] = preg_replace('/\D/', '', $arr[0]);
        $data['end_year']   = preg_replace('/\D/', '', $arr[1]);
        
        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['is_running'] = 0;
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }

        return $data;
    }

    
    
    /*****************Function delete**********************************
   * @type            : Function
   * @function name   : delete
   * @description     : delete "Academic Year" from database                  
   *                       
   * @param           : $id integer value
   * @return          : null 
   * ********************************************************** */
    public function delete($id = null) {
        
        
        check_permission(DELETE);
        
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('administrator/year');              
        }
        
        $academic_year = $this->year->get_single('academic_years', array('id' => $id));
        
        if ($this->year->delete('academic_years', array('id' => $id))) {  
            
            create_log('Has been deleted a academic Year : '.$academic_year->session_year); 
            success($this->lang->line('delete_success'));
            
        } else {
            error($this->lang->line('delete_failed'));
        }
        
        redirect('administrator/year');
    }
    
     /*     * **************Function activate**********************************
     * @type            : Function
     * @function name   : activate
     * @description     : this function used to activate current session       *                                
     * @param           : $id integer value; 
     * @return          : null 
     * ********************************************************** */

    public function activate($id = null, $school_id = null) {

        check_permission(EDIT);

        if ($id == '' || $school_id == '') {
            error($this->lang->line('update_failed'));
            redirect('administrator/year');
        }

        
        $this->year->update('academic_years', array('is_running' => 0), array('school_id'=>$school_id));
        $this->year->update('academic_years', array('is_running' => 1), array('id' => $id, 'school_id'=>$school_id));       
        
        $ay = $this->year->get_single('academic_years', array('id' => $id));
        $academic_year = $ay->start_year . ' - ' . $ay->end_year;
        $this->year->update('schools', array('academic_year_id' => $id, 'academic_year'=>$academic_year), array('id' => $school_id));       
        
        $school = $this->year->get_single('schools', array('id' => $school_id));
        create_log('Has been activated a academic Year : '.$academic_year.' for: '. $school->school_name);   
        
        success($this->lang->line('update_success'));
        redirect('administrator/year');
    }
    
    
        
    /*****************Function get_session_by_school**********************************
     * @type            : Function
     * @function name   : get_session_by_school
     * @description     : Load "get_session_by_school" by ajax call                
     *                    and populate user listing
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    
    public function get_session_by_school() {
        
        $school_id  = $this->input->post('school_id');
        $session  = $this->input->post('session');
         
        $school = $this->year->get_single('schools',array('id'=>$school_id));
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
         
        if (!empty($school)) {
            for($i = date('Y')-10; $i< date('Y')+20; $i++){   
                 
                $session_year = '';                                            
                $session_year = $this->lang->line($school->session_start_month). ' ' . $i; 
                $session_year .= ' - '; 
                $session_year .= $this->lang->line($school->session_end_month) .' '. ($i+1); 
                
                $selected = $session == $session_year ? $select : '';
                
                $str .= '<option value="' . $session_year . '" ' . $selected . '>' . $session_year . '</option>';
                
            }
        }

        echo $str;
    }
    
       

}
