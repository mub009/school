<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Invoice.php**********************************
 * @product name    : Multi School Management System 
 * @type            : Class
 * @class name      : Invoice
 * @description     : Manage invoice for all type of student payment.  
 * @author          : Mubashir 	
 * @url             : http://facebook.com/mubashir.p      
 * @support         : pro.mubashir@outlook.com	
 * @copyright       : Mubashir	 	
 * ********************************************************** */

class Invoice extends MY_Controller {

    public $data = array();    
    
    function __construct() {
        
        parent::__construct();
         $this->load->model('Invoice_Model', 'invoice', true);
         $this->load->model('Payment_Model', 'payment', true);
    }

    
    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Invoice List" user interface                 
    *                        
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {
        
        check_permission(VIEW);
        
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->invoice->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $this->data['income_heads'] = $this->invoice->get_fee_type($condition['school_id']);
        }
        
         // default global income head       
        $this->data['invoices'] = $this->invoice->get_invoice_list();  
         
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_invoice'). ' | ' . SMS);
        $this->layout->view('invoice/index', $this->data);            
       
    }
    
    
    
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific invoice data                 
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($id = null) {
        
        check_permission(VIEW);
        
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('accounting/invoice/index');
        }
     
        $invoice                = $this->payment->get_invoice_amount($id);        
        $this->data['paid_amount'] = $invoice->paid_amount;
        $this->data['invoice'] = $this->invoice->get_single_invoice($id);
        
              
        $school_id = $this->data['invoice']->school_id;
        $this->data['school']   = $this->invoice->get_school_by_id($school_id);
      
        $this->layout->title($this->lang->line('view'). ' ' . $this->lang->line('invoice'). ' | ' . SMS);
        $this->layout->view('invoice/view', $this->data);            
       
    }
    
    
     /*****************Function due**********************************
    * @type            : Function
    * @function name   : due
    * @description     : Load "Due Invoice List" user interface                 
    *                        
    * @param           : null
    * @return          : null 
    * ***********************************************************/
    public function due() {    
        
        check_permission(VIEW);
              
        $this->data['invoices'] = $this->invoice->get_invoice_list('due');  
        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('due_invoice'). ' | ' . SMS);
        $this->layout->view('invoice/due', $this->data);            
       
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Create new Invoice" user interface                 
    *                    and store "Invoice" data into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);
        
        if ($_POST) {
            $this->_prepare_invoice_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_invoice_data();

                $insert_id = $this->invoice->insert('invoices', $data);
                if ($insert_id) { 
                    
                    create_log('Has been created a invoice : '. $data['net_amount']);
                    
                    // save transction table data
                    $data['invoice_id'] = $insert_id;
                    $this->_save_transaction($data);
                    
                    success($this->lang->line('insert_success'));
                    redirect('accounting/invoice/index');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('accounting/invoice/add');
                }
            } else {
                $this->data['post'] = $_POST;
            }
        }

        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->invoice->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $this->data['income_heads'] = $this->invoice->get_fee_type($condition['school_id']);
        }
        
        // default global income head
        $this->data['invoices'] = $this->invoice->get_invoice_list(); 
          
        
        $this->data['single'] = TRUE;
        $this->layout->title($this->lang->line('create'). ' ' . $this->lang->line('invoice'). ' | ' . SMS);
        $this->layout->view('invoice/index', $this->data);
    }

        
    /*****************Function bulk**********************************
    * @type            : Function
    * @function name   : bulk
    * @description     : Load "Create new bulk Invoice" user interface                 
    *                    and store "Invoice" data into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function bulk() {

        check_permission(ADD);
        
        if ($_POST) {
           
            $this->_prepare_invoice_validation();           
            if ($this->form_validation->run() === TRUE) {
               
                $status = $this->_get_create_bulk_invoice();
                if ($status) {
                    success($this->lang->line('insert_success'));
                    redirect('accounting/invoice/index');
                    
                } else {                  
                    error($this->lang->line('insert_failed'));
                    redirect('accounting/invoice/bulk');
                }
            } else {
                $this->data['post'] = $_POST;
            }
        }

        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->invoice->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $this->data['income_heads'] = $this->invoice->get_fee_type($condition['school_id']);
        }
        
        // default global income head
        $this->data['invoices'] = $this->invoice->get_invoice_list(); 
          
        
        $this->data['bulk'] = TRUE;
        $this->layout->title($this->lang->line('create'). ' ' . $this->lang->line('invoice'). ' | ' . SMS);
        $this->layout->view('invoice/index', $this->data);
    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Invoice" user interface                 
    *                    with populated "Invoice" value 
    *                    and update "Invoice" database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {       
       
        check_permission(EDIT);
        
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
             redirect('accounting/invoice/index');
        }
        
        if ($_POST) {
            $this->_prepare_invoice_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_invoice_data();
                $updated = $this->invoice->update('invoices', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been updated a invoice : '. $data['net_amount']);
                    
                    success($this->lang->line('update_success'));
                    redirect('accounting/invoice/index');                   
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('accounting/invoice/edit/' . $this->input->post('id'));
                }
            } else {
                 $this->data['invoice'] = $this->invoice->get_single('invoices', array('id' => $this->input->post('id')));
            }
        }
        
        if ($id) {
            $this->data['invoice'] = $this->invoice->get_single('invoices', array('id' => $id));

            if (!$this->data['invoice']) {
                 redirect('accounting/invoice/index');
            }
        }
        
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->invoice->get_list('classes', $condition, '','', '', 'id', 'ASC');
        }
        
        // default global income head
        $this->data['income_heads'] = $this->invoice->get_list('income_heads', array('status'=> 1), '','', '', 'id', 'ASC');        
        $this->data['invoices'] = $this->invoice->get_invoice_list(); 
        
        $this->data['school_id'] = $this->data['invoice']->school_id;

        $this->data['edit'] = TRUE;       
        $this->layout->title($this->lang->line('edit'). ' ' . $this->lang->line('invoice'). ' | ' . SMS);
        $this->layout->view('invoice/index', $this->data);
    }

    
    /*****************Function _prepare_invoice_validation**********************************
    * @type            : Function
    * @function name   : _prepare_invoice_validation
    * @description     : Process "Invoice" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_invoice_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
        
        $this->form_validation->set_rules('school_id', $this->lang->line('school'), 'trim|required');               
        $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required');
        $this->form_validation->set_rules('paid_status', $this->lang->line('paid').' '.$this->lang->line('status'), 'trim|required'); 
        
        if($this->input->post('type')== 'single'){
            $this->form_validation->set_rules('student_id', $this->lang->line('student_id'), 'trim|required'); 
            $this->form_validation->set_rules('amount', $this->lang->line('amont'), 'trim|required');   
        }
        
        $this->form_validation->set_rules('is_applicable_discount', $this->lang->line('is_applicable_discount'), 'trim|required');   
        $this->form_validation->set_rules('month', $this->lang->line('month'), 'trim|required');   
        $this->form_validation->set_rules('income_head_id', $this->lang->line('title'), 'trim|required');   
        
       
        
    }


    
    /*****************Function _get_posted_invoice_data**********************************
     * @type            : Function
     * @function name   : _get_posted_invoice_data
     * @description     : Prepare "Invoice" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */
    private function _get_posted_invoice_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'income_head_id';
        $items[] = 'class_id';
        $items[] = 'student_id';
        $items[] = 'is_applicable_discount';  
        $items[] = 'month';        
        $items[] = 'paid_status';        
        $items[] = 'note';
        
        $data = elements($items, $_POST);          
        
        $income_head = $this->invoice->get_single('income_heads', array('id' => $this->input->post('income_head_id')));
        
                    
        $data['discount'] = 0.00;
        $data['gross_amount'] = $this->input->post('amount');
        $data['net_amount'] = $this->input->post('amount');
        
        if($data['is_applicable_discount']){
            
            $discount = $this->invoice->get_student_discount($data['student_id']);
            if(!empty($discount)){
                $data['discount']   = $discount->amount/100*$data['gross_amount'];;
                $data['net_amount'] = $data['gross_amount'] - $data['discount'];
            }
        }
        
        $data['date'] = date('Y-m-d');
    
        if ($this->input->post('id')) {
            
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
            
        } else {
            $data['custom_invoice_id'] = $this->invoice->get_custom_id('invoices', 'INV');
            $data['status'] = 1;
            $data['invoice_type'] = $income_head->head_type;
            
            $school = $this->invoice->get_school_by_id($data['school_id']);
            
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('accounting/invoice/index');
            }             
            
            $data['academic_year_id'] = $school->academic_year_id;
            
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();                       
        }

        return $data;
    }
    

        /*****************Function _get_create_bulk_invoice**********************************
     * @type            : Function
     * @function name   : _get_create_bulk_invoice
     * @description     : Prepare "Invoice" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */
    private function _get_create_bulk_invoice() {
        
        $data = array();
       
        $items[] = 'school_id';
        $items[] = 'income_head_id';
        $items[] = 'class_id';       
        $items[] = 'is_applicable_discount';  
        $items[] = 'month'; 
        $items[] = 'paid_status';
        $items[] = 'note';
        
        $data = elements($items, $_POST);         
        
        $income_head = $this->invoice->get_single('income_heads', array('id' => $this->input->post('income_head_id')));
        
        $data['date'] = date('Y-m-d');            
        $data['discount'] = 0.00;
        $data['status'] = 1;
        
        $school = $this->invoice->get_school_by_id($data['school_id']);
        
        if(!$school->academic_year_id){
            error($this->lang->line('set_academic_year_for_school'));
            redirect('accounting/invoice/index');
        } 
        
        $data['academic_year_id'] = $school->academic_year_id;
      
     foreach ($this->input->post('students') as $key=>$value){
        
            $data['student_id'] = $key;            
            $data['gross_amount'] = $value;
            $data['net_amount'] = $value;

            if($data['is_applicable_discount']){

                $discount = $this->invoice->get_student_discount($data['student_id']);
                if(!empty($discount)){
                    $data['discount']   = $discount->amount/100*$data['gross_amount'];
                    $data['net_amount'] = $data['gross_amount'] - $data['discount'];
                }
            }

            $data['custom_invoice_id'] = $this->invoice->get_custom_id('invoices', 'INV');
            
            $data['invoice_type'] = $income_head->head_type;            
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id(); 
            
           $insert_id = $this->invoice->insert('invoices', $data);
            
            // save transction table data
            $txn = array(); 
            $txn = $data;
            $txn['invoice_id'] = $insert_id;
            $this->_save_transaction($txn);
            
           
        }
        
        create_log('Has been created a invoice : '. $data['net_amount']);
        return TRUE; 
    }

    
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Invoice" from database                  
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {
        
        check_permission(DELETE);
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
             redirect('accounting/invoice/index');
        } 
                
        $invoice = $this->invoice->get_single('invoices', array('id' => $id));
        
        if ($this->invoice->delete('invoices', array('id' => $id))) {  
            
            create_log('Has been deleted a invoice : '. $invoice->net_amount);
            
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        
        redirect('accounting/invoice/index');
    }
    
    
        
    /*****************Function _save_transaction**********************************
     * @type            : Function
     * @function name   : _save_transaction
     * @description     : transaction data save/update into database 
     *                    while add/update income data into database                
     *                       
     * @param           : $id integer value
     * @return          : null 
     * ********************************************************** */
    private function _save_transaction($data){
        
        if($data['paid_status'] == 'paid'){
        
            $txn = array();
            $txn['school_id'] = $data['school_id'];  
            $txn['amount'] = $data['net_amount'];  
            $txn['note'] = $data['note'];
            $txn['payment_date'] = $data['date'];
            $txn['payment_method'] = $this->input->post('payment_method');
            $txn['bank_name'] = $this->input->post('bank_name');
            $txn['cheque_no'] = $this->input->post('cheque_no');

            if ($this->input->post('id')) {

                $txn['modified_at'] = date('Y-m-d H:i:s');
                $txn['modified_by'] = logged_in_user_id();
                $this->invoice->update('transactions', $txn, array('invoice_id'=>$this->input->post('id')));

            } else {            

                $txn['invoice_id'] = $data['invoice_id'];
                $txn['status'] = 1;
                $txn['academic_year_id'] = $data['academic_year_id'];            
                $txn['created_at'] = $data['created_at'];
                $txn['created_by'] = $data['created_by'];
                $this->invoice->insert('transactions', $txn);
            }        
        }
    }
    
    
    
    /* Ajax */
    public function get_fee_type_by_school(){
        
        $school_id = $this->input->post('school_id');
        $fee_type_id = $this->input->post('fee_type_id');
        
        $income_heads = $this->invoice->get_fee_type($school_id);
         
        $str = '<option value="">--' . $this->lang->line('select') . '--</option>';
        $select = 'selected="selected"';
        if (!empty($income_heads)) {
            foreach ($income_heads as $obj) {   
                
                $selected = $fee_type_id == $obj->id ? $select : '';
                $str .= '<option value="' . $obj->id . '" ' . $selected . '>' . $obj->title .' </option>';
                
            }
        }

        echo $str;
    }
    
     public function get_fee_amount(){
        
        $school_id = $this->input->post('school_id'); 
        $class_id       = $this->input->post('class_id');       
        $student_id     = $this->input->post('student_id'); 
        $income_head_id = $this->input->post('income_head_id');
        
        $income_head = $this->invoice->get_single('income_heads', array('id' => $income_head_id));        
        $amount = 0.00;
        
        if($income_head->head_type == 'hostel'){
            
            $fee = $this->invoice->get_hostel_fee($student_id);            
            if(!empty($fee)){
                $amount = $fee->cost;
            }            
            
        }elseif($income_head->head_type == 'transport'){
            
            $fee = $this->invoice->get_transport_fee($student_id);            
            if(!empty($fee)){
                $amount = $fee->stop_fare;
            }
            
        }else{
            
            $fee = $this->invoice->get_single('fees_amount', array('class_id' => $class_id, 'income_head_id'=>$income_head_id));
            if(!empty($fee)){
                $amount = $fee->fee_amount;
            }
        }
        
        echo $amount;
    }
    
    
    public function get_student_and_fee_amount(){
        
        
        $school_id = $this->input->post('school_id');
        $class_id       = $this->input->post('class_id');       
        $income_head_id = $this->input->post('income_head_id');
        
        $income_head = $this->invoice->get_single('income_heads', array('id' => $income_head_id));
        $amount = 0.00;
        
        $school = $this->invoice->get_school_by_id($school_id);
        if(!$school->academic_year_id){
            echo 'ay';
            die();
        } 
            
        $students = $this->invoice->get_student_list($school_id, $school->academic_year_id, $class_id); 
       
        $str = '';
        
        if(!empty($students)){
            
            $fee = $this->invoice->get_single('fees_amount', array('class_id' => $class_id, 'income_head_id' => $income_head_id));
            
            foreach($students as $obj){
                
                // when fee is transport and hostel then need to check
                // that student is eligible for fee
                if($income_head->head_type == 'hostel' && $obj->is_hostel_member == 0){
                    continue;
                }elseif($income_head->head_type == 'transport' && $obj->is_transport_member == 0){
                    continue;
                }               
                
                if($income_head->head_type == 'hostel'){
            
                    $hostel_fee = $this->invoice->get_hostel_fee($obj->id);
                    if (!empty($hostel_fee)) {
                        $amount = $hostel_fee->cost;
                    }
                } elseif ($income_head->head_type == 'transport') {

                    $transport_fee = $this->invoice->get_transport_fee($obj->id);
                    if (!empty($transport_fee)) {
                        $amount = $transport_fee->stop_fare;
                    }
                } else { 
                    
                    if(!empty($fee)){
                        $amount = $fee->fee_amount;
                    }
                }
                
                // making student string....
                $str .= '<div class="multi-check"><input type="checkbox" name="students['.$obj->id.']" value="'.$amount.'" /> '.$obj->name.' ['.$school->currency_symbol.$amount.']</div>';
            }
        }
        
        echo $str;
    }
    
   
}
