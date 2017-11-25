<?php
/* 
 * File Name: employee_model.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class modulo_metadata extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function get_meta()
    {
        //$this->db->where('employee_no', $empno);
        $this->db->from('meta');
        $this->db->join('usuarios','usuarios.id_usuario=meta.usuario');
        $query = $this->db->get();
        return $query->result();
    }	
   function tipos($tipo)
    {   
        $this->db->from('meta');
        $this->db->where('descripcion',$tipo);
        $query = $this->db->get();
   
            if ($this->db->affected_rows() > 0) 
            {
            return true;
            
            } else 
            {
            return false;
            }
    }

    public function registration_insert($data) {
    
     $this->db->insert('meta',$data);
    }
    
         

    }
    

?>