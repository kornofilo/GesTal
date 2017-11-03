<?php
/* 
 * File Name: employee_model.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulo_grupos extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function get_grupos_record_all()
    {
        
        $this->db->from('grupos');
        $query = $this->db->get();
        return $query->result();
    }	
   
    
}
?>