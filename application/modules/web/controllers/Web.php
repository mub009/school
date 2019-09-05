<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Web.php**********************************
 * @product name    : Multi School Management System 
 * @type            : Class
 * @class name      : Web
 * @description     : Manage frontend website.  
 * @author          : Mubashir 	
 * @url             : http://facebook.com/mubashir.p      
 * @support         : pro.mubashir@outlook.com	
 * @copyright       : Mubashir	 	
 * ********************************************************** */

class Web extends CI_Controller {

    public $data = array();
    public $global_setting = array();
    public $schools = array();
    
    function __construct() {
        parent::__construct();
        $this->load->model('Web_Model', 'web', true); 
        
        $global_setting = $this->db->get_where('global_setting',array('status'=>1))->row();
        if($global_setting){
            $this->global_setting = $global_setting;
            
            if(!$this->global_setting->enable_frontend){
                redirect('/', 'refresh');
            }
        } 
        
         $this->data['schools'] = $this->web->get_list('schools', array('status'=>1, 'enable_frontend'=>1), '', '', '', 'id', 'ASC');
         
        if(count($this->data['schools']) == 1){
             $this->session->set_userdata('front_school_id', $this->data['schools'][0]->id);
        }
         
        if($this->session->userdata('front_school_id')){ 
            $this->data['school'] = $this->web->get_single('schools', array('status' => 1, 'id'=>$this->session->userdata('front_school_id')));
            $this->data['footer_pages'] = $this->web->get_list('pages', array('status' => 1, 'page_location'=>'footer', 'school_id'=>$this->session->userdata('front_school_id')));
            $this->data['header_pages'] = $this->web->get_list('pages', array('status' => 1, 'page_location'=>'header',  'school_id'=>$this->session->userdata('front_school_id')));
        }        
         
    }
    
    
    public function school($id = null){
        
        if(!$id){
            redirect();
        }        
              
        $school = $this->web->get_single('schools', array('status' => 1, 'id'=>$id));
        
        if(!empty($school)){
            $this->session->set_userdata('front_school_id', $school->id);
        }else{
           $this->session->set_flashdata('error', $this->lang->line('invalid_school_selection')); 
        }

        redirect();       
    }





    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Frontend home page" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {
        
        
        if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            
            $this->data['sliders'] = $this->web->get_list('sliders', array('status' => 1, 'school_id'=>$school_id), '', '', '', 'id', 'ASC');
            $this->data['events'] = $this->web->get_event_list($school_id, 6);
            $this->data['news'] = $this->web->get_news_list($school_id, 6);
            
            $this->data['teacher'] = $this->web->get_total_teacher($school_id);
            $this->data['student'] = $this->web->get_total_student($school_id);
            $this->data['staff'] = $this->web->get_total_staff($school_id);
            $this->data['user'] = $this->web->get_total_user($school_id);            
            
            $this->data['feedbacks'] = $this->web->get_feedback_list($school_id, 20);
            
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('home') . ' | ' . SMS);
            $this->layout->view('index', $this->data);

        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    
    /*****************Function news**********************************
    * @type            : Function
    * @function name   : news
    * @description     : Load "news listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function news() {

        if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            
            $this->data['news'] = $this->web->get_news_list($school_id, 100);
            $this->data['list'] = TRUE;
            
            $this->layout->title($this->lang->line('news') . ' | ' . SMS);
            $this->layout->view('news', $this->data);
        
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    
    /*****************Function news**********************************
    * @type            : Function
    * @function name   : news
    * @description     : Load "news detail" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function news_detail($id) {

        if($id == '' || !is_numeric($id)){            
            redirect(site_url('news'));
        }
        
        if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            
            $this->data['news'] = $this->web->get_single_news($school_id, $id); 
            $this->data['latest_news'] = $this->web->get_news_list($school_id, 6);
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('news') . ' | ' . SMS);
            $this->layout->view('news_detail', $this->data);
        
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    
    
    /*****************Function notice**********************************
    * @type            : Function
    * @function name   : notice
    * @description     : Load "notice listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function notice() {
        
        if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');

            $this->data['notices'] = $this->web->get_notice_list($school_id, 100);
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('notice') . ' | ' . SMS);
            $this->layout->view('notice', $this->data);
        
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    /*****************Function notice_detail**********************************
    * @type            : Function
    * @function name   : notice_detail
    * @description     : Load "notice_detail" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function notice_detail($id) {

        if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            
            $this->data['notice'] = $this->web->get_single_notice($school_id, $id);
            $this->data['notices'] = $this->web->get_notice_list($school_id, 6);
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('notice') . ' | ' . SMS);
            $this->layout->view('notice_detail', $this->data);        
        
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    
    /*****************Function holiday**********************************
    * @type            : Function
    * @function name   : holiday
    * @description     : Load "holiday listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function holiday() {

        if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            
            $this->data['holidays'] = $this->web->get_list('holidays', array('status'=>1, 'school_id'=>$school_id, 'is_view_on_web'=>1), '', '', '', 'id', 'DESC');
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('holiday') . ' | ' . SMS);            
            $this->layout->view('holiday', $this->data);
            
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    /*****************Function holiday_detail**********************************
    * @type            : Function
    * @function name   : holiday_detail
    * @description     : Load "holiday_detail" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function holiday_detail($id) {

         if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            
            $this->data['holiday'] = $this->web->get_single('holidays', array('id'=>$id, 'status'=>1, 'school_id'=>$school_id, 'is_view_on_web'=>1));
            $this->data['holidays'] = $this->web->get_list('holidays', array('status'=>1, 'school_id'=>$school_id, 'is_view_on_web'=>1), '', '6', '', 'id', 'DESC');
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('holiday') . ' | ' . SMS);
            $this->layout->view('holiday_detail', $this->data);
        
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    /*****************Function event**********************************
    * @type            : Function
    * @function name   : event
    * @description     : Load "event listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function events() {

        if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            
            $this->data['events'] = $this->web->get_event_list($school_id, 6);
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('event') . ' | ' . SMS);
            $this->layout->view('event', $this->data);
            
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    /*****************Function event_detail**********************************
    * @type            : Function
    * @function name   : event_detail
    * @description     : Load "event_detail" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function event_detail($id){

        if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            
            $this->data['event'] = $this->web->get_single_event($school_id, $id);
            $this->data['events'] = $this->web->get_event_list($school_id, 6);
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('event') . ' | ' . SMS);
            $this->layout->view('event_detail', $this->data);
        
         }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    
    
    /*****************Function gallery**********************************
    * @type            : Function
    * @function name   : gallery
    * @description     : Load "gallery listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function galleries() {

        if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            $this->data['galleries'] = $this->web->get_list('galleries', array('status'=>1, 'school_id'=>$school_id, 'is_view_on_web'=>1), '', '', '', 'id', 'DESC');
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('media_gallery') . ' | ' . SMS);
            $this->layout->view('gallery', $this->data);
         
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }

    /*****************Function teacher**********************************
    * @type            : Function
    * @function name   : teacher
    * @description     : Load "teacher listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function teachers() {

         if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            $this->data['teachers'] = $this->web->get_teacher_list($school_id);
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('teacher') . ' | ' . SMS);
            $this->layout->view('teacher', $this->data);        
          
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    
    /*****************Function staff**********************************
    * @type            : Function
    * @function name   : staff
    * @description     : Load "staff listing" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function staff() {

         if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            $this->data['employees'] = $this->web->get_employee_list($school_id);
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('staff') . ' | ' . SMS);
            $this->layout->view('staff', $this->data);
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    
    /*****************Function Page**********************************
    * @type            : Function
    * @function name   : Page
    * @description     : Load "Dynamic Pages" user interface                 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function page($slug = null) { 
        
         if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            $this->data['page'] = $this->web->get_single('pages', array('status' => 1, 'school_id'=>$school_id, 'page_slug'=>$slug));
            
            if(empty($this->data['page'])){
                redirect('/', 'refresh');
            }
            
            $this->layout->title($this->lang->line('page') . ' ' . $this->lang->line('school'). ' | ' . SMS);
            $this->layout->view('page', $this->data);
            
         }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    
    /*****************Function About**********************************
    * @type            : Function
    * @function name   : About
    * @description     : Load "About Us" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function about() {
        if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('about') . ' ' . $this->lang->line('school'). ' | ' . SMS);
            $this->layout->view('about', $this->data);
            
        }else{            
            $this->load->view('splash', $this->data);              
        }
        
    }
    
    /*****************Function admission**********************************
    * @type            : Function
    * @function name   : admission
    * @description     : Load "admission" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function admission() {
    
       if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('admission_form') . ' | ' . SMS);
            $this->layout->view('admission', $this->data);
            
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
    
    /*****************Function contact**********************************
    * @type            : Function
    * @function name   : contact
    * @description     : Load "contact" user interface                 
    *                    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function contact() {

        if($this->session->userdata('front_school_id')){           

            $school_id = $this->session->userdata('front_school_id');
            if($_POST){               
                
                if($this->_send_email()){
                    $this->session->set_userdata('success', $this->lang->line('email_send_success'));
                }else{
                    $this->session->set_userdata('error', $this->lang->line('email_send_failed'));
                }               
                redirect(site_url('contact'));
            }

            $this->data['list'] = TRUE;
            $this->layout->title($this->lang->line('contact_us') . ' | ' . SMS);
            $this->layout->view('contact', $this->data);
        
        }else{            
            $this->load->view('splash', $this->data);              
        }
    }
    
        /*     * ***************Function _send_email**********************************
     * @type            : Function
     * @function name   : _send_email
     * @description     : this function used to send recover forgot password email 
     * @param           : $data array(); 
     * @return          : null 
     * ********************************************************** */

    private function _send_email() {

        $this->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

       
        $this->email->from($this->input->post('email'), $this->input->post('name'));
        $this->email->to($this->data['school']->email);
        //$this->email->to('pro.mubashir@outlook.com');
        $this->email->subject($this->data['school']->school_name . ': Contact email from visitor');       

        $message = 'Contact mail from ' . $this->data['school']->school_name . '.<br/>';          
        $message .= '<br/><br/>';
        $message .= 'Name: ' . $this->input->post('name');
        $message .= '<br/><br/>';      
        $message .= 'Email: ' . $this->input->post('email');
        $message .= '<br/><br/>';
        $message .= 'Phone: ' . $this->input->post('phone');
        $message .= '<br/><br/>';
        $message .= 'Subject: ' . $this->input->post('subject');
        $message .= '<br/><br/>';
        $message .= 'Message: ' . $this->input->post('message');
        $message .= '<br/><br/>';
        $message .= 'Thank you<br/>';     

        $this->email->message($message);
        if($this->email->send()){
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
