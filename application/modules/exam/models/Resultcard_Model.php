<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resultcard_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_final_result($school_id, $academic_year_id, $class_id, $section_id, $student_id){
        $this->db->select('FR.*, G.name AS grade');
        $this->db->from('final_results AS FR');        
        $this->db->join('grades AS G', 'G.id = FR.grade_id', 'left');
        $this->db->where('FR.academic_year_id', $academic_year_id);
        $this->db->where('FR.school_id', $school_id);
        $this->db->where('FR.class_id', $class_id);
        $this->db->where('FR.section_id', $section_id);
        $this->db->where('FR.student_id', $student_id);
        return $this->db->get()->row();   
        //echo $this->db->last_query();   
    }


}
