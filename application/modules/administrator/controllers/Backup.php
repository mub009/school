<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/* * *****************Backup.php**********************************
 * @product name    : Multi School Management System 
 * @type            : Class
 * @class name      : Backup
 * @description     : Backup system database by system adminstrator.  
 * @author          : Mubashir 	
 * @url             : http://facebook.com/mubashir.p      
 * @support         : pro.mubashir@outlook.com	
 * @copyright       : Mubashir	 	
 * ********************************************************** */
class Backup extends MY_Controller {

    public $data = array();
    
    
    function __construct() {
        parent::__construct();
         $this->load->model('Administrator_Model', 'administrator', true);
    }
    
    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load user interface for backup database and take backup database                
    *                    
    * @param           : null integer value
    * @return          : null 
    * ********************************************************** */
    public function index() {
        
        check_permission(VIEW);
        
        if ($_POST) {             
            if (IS_LIVE == TRUE) {
              
                $this->load->dbutil();
                $conf = array(
                    'format' => 'zip',
                    'filename' => 'database-backup.sql'
                );
                $backup = $this->dbutil->backup($conf);
                $this->load->helper('download');
                force_download('database-backup.zip', $backup);
                
                create_log('Has been taken database backup');
                redirect('administrator/backup');
            } else {
                error($this->lang->line('in_demo_db_backup'));
                redirect('administrator/backup');
            }
        } else {
            $this->layout->title($this->lang->line('backup'). ' ' . $this->lang->line('database'). ' | ' . SMS);
            $this->layout->view('backup/index', $this->data);  
        }
    }
    
    
}
