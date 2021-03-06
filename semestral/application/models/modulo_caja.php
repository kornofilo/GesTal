<?php
/* 
 * File Name: employee_model.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class modulo_caja extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function get_caja()
    {
        //$this->db->where('employee_no', $empno);
        $this->db->from('caja');
        $query = $this->db->get();
        return $query->result();
    }	
   

    public function registration_insert($data) {
    

    $condition = "nombre_caja =" . "'" . $data['nombre_caja'] . "'";
    
    
    $this->db->from('caja');
    $this->db->where($condition);
    $this->db->limit(1);
    
    $query = $this->db->get();
    if ($query->num_rows() == 0) 
    {

        // Query to insert data in database
        $this->db->insert('caja',$data);
        if ($this->db->affected_rows() > 0) 
        {
        return true;
        }
    } else 
    {
    return false;
    }
}
    function tiene_permiso($modulo,$accion){
         $grupo_del_usuario=($this->session->userdata['logged_in']['grupo_del_usuario']);
         $uno=1;
        if ($accion=="s") {
            $condition = "id_del_grupo = ".$grupo_del_usuario." and modulos.descripcion= "."'".$modulo."'"." and s=".$uno.";";
            $this->db->from('grupos_modulos');
            $this->db->join('modulos','grupos_modulos.id_del_modulo=modulos.id_modulo');
            $this->db->where($condition);

            $query = $this->db->get();
            if ($query->num_rows()>0) 
            {  
            return true;
            }
        }
        if ($accion=="i") {
            $condition = "id_del_grupo = ".$grupo_del_usuario." and modulos.descripcion= "."'".$modulo."'"." and i=".$uno.";";
            $this->db->from('grupos_modulos');
            $this->db->join('modulos','grupos_modulos.id_del_modulo=modulos.id_modulo');
            $this->db->where($condition);

            $query = $this->db->get();
            if ($query->num_rows()>0) 
            {  
            return true;
            }
        }
        if ($accion=="u") {
            $condition = "id_del_grupo = ".$grupo_del_usuario." and modulos.descripcion= "."'".$modulo."'"." and u=".$uno.";";
            $this->db->from('grupos_modulos');
            $this->db->join('modulos','grupos_modulos.id_del_modulo=modulos.id_modulo');
            $this->db->where($condition);

            $query = $this->db->get();
            if ($query->num_rows()>0) 
            {  
            return true;
            }
        }
        if ($accion=="d") {
            
            $condition = "id_del_grupo = ".$grupo_del_usuario." and modulos.descripcion= "."'".$modulo."'"." and d=".$uno.";";
            $this->db->from('grupos_modulos');
            $this->db->join('modulos','grupos_modulos.id_del_modulo=modulos.id_modulo');
            $this->db->where($condition);

            $query = $this->db->get();
            if ($query->num_rows()>0) 
            {  
            return true;
            }
        }
         

    }
    
}
?>