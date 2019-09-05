<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
     public function get_transport_member_list($is_transport_member = 1, $school_id = null, $academic_year_id = null) {

        $this->db->select('ST.*, SC.school_name, R.title AS route_name, TM.id AS tm_id, TM.route_id, E.roll_no, C.name AS class_name, S.name AS section');
        $this->db->from('students AS ST');
        $this->db->join('enrollments AS E', 'E.student_id = ST.id', 'left');
        $this->db->join('classes AS C', 'C.id = E.class_id', 'left');
        $this->db->join('sections AS S', 'S.id = E.section_id', 'left');
        $this->db->join('transport_members AS TM', 'TM.user_id = ST.user_id', 'left');
        $this->db->join('routes AS R', 'R.id = TM.route_id', 'left');
        $this->db->join('schools AS SC', 'SC.id = ST.school_id', 'left');
        
        if($academic_year_id){
            $this->db->where('E.academic_year_id', $academic_year_id);
        }
        $this->db->where('ST.is_transport_member', $is_transport_member);
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $this->db->where('ST.school_id', $this->session->userdata('school_id'));
        }elseif($school_id){
            $this->db->where('ST.school_id', $school_id);
        }
        
        $this->db->order_by('TM.id', 'DESC');
        return $this->db->get()->result();
    }
}
