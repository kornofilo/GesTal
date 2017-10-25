<?php
/* 
 * File Name: employee_model.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulo_usuarios extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function get_usuarios_record_all()
    {
        //$this->db->where('employee_no', $empno);
        $this->db->from('usuarios');
        $this->db->join('grupos','grupos.id_grupo=usuarios.id_del_grupo');
        $query = $this->db->get();
        return $query->result();
    }	
   
    
}
?>