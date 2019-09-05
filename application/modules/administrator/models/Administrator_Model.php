<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administrator_Model extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_user_list($school_id, $role_id, $class_id, $user_id) {
        
        
        if ($role_id == STUDENT) {

            $school = $this->get_school_by_id($school_id);
            
            $this->db->select('S.*, U.username, U.role_id, U.status AS login_status ');
            $this->db->from('enrollments AS E');
            $this->db->join('students AS S', 'S.id = E.student_id', 'left');
            $this->db->join('users AS U', 'U.id = S.user_id', 'left');
            $this->db->where('E.academic_year_id', $school->academic_year_id);
            $this->db->where('S.school_id', $school_id);
            if($class_id){
                $this->db->where('E.class_id', $class_id);
            }            
             if($user_id){
                $this->db->where('S.user_id', $user_id);                 
             }
            return $this->db->get()->result();
            
        } elseif ($role_id == TEACHER) {
            
            $this->db->select('T.*, U.username, U.role_id, U.status AS login_status ');
            $this->db->from('teachers AS T');
            $this->db->join('users AS U', 'U.id = T.user_id', 'left');
            $this->db->where('T.school_id', $school_id);
            
             if($user_id){
                $this->db->where('T.user_id', $user_id);                 
             }
            return $this->db->get()->result();
            
        } elseif ($role_id == GUARDIAN) {
            
            $this->db->select('G.*, U.username, U.role_id, U.status AS login_status ');
            $this->db->from('guardians AS G');
            $this->db->join('users AS U', 'U.id = G.user_id', 'left');
            $this->db->where('G.school_id', $school_id);
             if($user_id){                 
                $this->db->where('G.user_id', $user_id);
             }
            return $this->db->get()->result();
            
        } else {
            
            $this->db->select('E.*, U.username, U.role_id, D.name AS designation, U.status AS login_status ');
            $this->db->from('employees AS E');
            $this->db->join('users AS U', 'U.id = E.user_id', 'left');
            $this->db->join('designations AS D', 'D.id = E.designation_id', 'left');
            $this->db->where('E.school_id', $school_id);
            if($user_id){
                $this->db->where('E.user_id', $user_id);
            }
            $this->db->where('U.role_id', $role_id);
            return $this->db->get()->result();
        }
    }
    
        
    public function get_activity_log($school_id, $role_id, $class_id = null, $user_id = null) {
                    
        $this->db->select('L.*');
        $this->db->from('activity_logs AS L');
        $this->db->join('users AS U', 'U.id = L.user_id', 'left');
        
        if($role_id){
            $this->db->where('L.role_id', $role_id);
        } 
        if($user_id){
           $this->db->where('L.user_id', $user_id);                 
        }
        if($school_id){
          $this->db->where('L.school_id', $school_id);                 
        }
        
        return $this->db->get()->result();
    }
    
}