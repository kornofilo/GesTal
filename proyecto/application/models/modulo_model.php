<?php
/* 
 * File Name: employee_model.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulo_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function get_productos_record_all()
    {
        $grupo_usuario=($this->session->userdata['logged_in']['grupo_del_usuario']);
    //	$condition = "id_grupo=" . "'" . $grupo_usuario . "'";
      //  $condition = "id_grupo=3";

         
        //$this->db->where('employee_no', $empno);
        $this->db->from('grupos_modulos');
        $this->db->join('modulos','grupos_modulos.id_modulo=modulos.id');
        $this->db->join('grupos','grupos.id=grupos_modulos.id_grupo');
 
    //$this->db->select('*');
       $this->db->where('id_grupo',$grupo_usuario); 

        $query = $this->db->get();
        return $query->result();
    }	
   
    
}
?>