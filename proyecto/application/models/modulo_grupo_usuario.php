<?php
/* 
 * File Name: employee_model.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulo_grupo_usuario extends CI_Model
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
        $this->db->where('estado',1);
        $this->db->join('grupos','grupos.id_grupo=usuarios.id_del_grupo');
        $query = $this->db->get();
        return $query->result();
    }  
   
    function get_usuarios_sin()
    {
        
        $condition = "estado = 1 and id_del_grupo = 0";
        $this->db->from('usuarios');
        $this->db->where($condition);
        $this->db->join('grupos','grupos.id_grupo=usuarios.id_del_grupo');
        $query = $this->db->get();
        return $query->result();
    } 

    
    function get_dropdown_list()
    {
        $this->db->from('grupos');
        $result = $this->db->get();
        $return = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $return[$row['id_grupo']] = $row['nombre_grupo'];
            }
        }

            return $return;
        } 

   function actualiza($id_usuario,$id_del_grupo){
         
        $campos=array(
                 'id_del_grupo'=>$id_del_grupo
                  );
        $this->db->where('id_usuario',$id_usuario);
        $this->db->update('usuarios',$campos);
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }

    public function registration_insert($data) {
    $condition = "nombre =" . "'" . $data['nombre'] . "'";
    $this->db->from('usuarios');
    $this->db->where($condition);
    $this->db->limit(1);
    
    $query = $this->db->get();
    if ($query->num_rows() == 0) 
        {
            // Query to insert data in database
            $this->db->insert('usuarios',$data);
            if ($this->db->affected_rows() > 0) 
            {
            return true;
            }
        } else {
            return false;
          }
   } 
    
    
}
?>