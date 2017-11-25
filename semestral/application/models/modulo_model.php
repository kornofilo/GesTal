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
        
         
        $this->db->from('grupos_modulos');
        $this->db->join('modulos','grupos_modulos.id_del_modulo=modulos.id_modulo');
        $this->db->join('grupos','grupos.id_grupo=grupos_modulos.id_del_grupo');
 

      

        $query = $this->db->get();
        return $query->result();
    }
    function get_gruposymodulos($id_del_grupo,$id_del_modulo)
    {
        
       $this->db->where('id_del_grupo',$id_del_grupo); 
       $this->db->where('id_del_modulo',$id_del_grupo); 
        $this->db->from('grupos_modulos');
        $this->db->join('modulos','grupos_modulos.id_del_modulo=modulos.id_modulo');
        $this->db->join('grupos','grupos.id_grupo=grupos_modulos.id_del_grupo');
 

      

        $query = $this->db->get();
        return $query->result();
    }
    function get_modulos($id_del_grupo)
    {
        

     
        $this->db->from('grupos_modulos');
        $this->db->join('modulos','grupos_modulos.id_del_modulo=modulos.id_modulo');
        $this->db->join('grupos','grupos.id_grupo=grupos_modulos.id_del_grupo');
 
    
       $this->db->where('id_grupo',$id_del_grupo); 

        $query = $this->db->get();
        return $query->result();
    }
   
    function  trae_modelos()
    {
        $this->db->from('modulos');
        $result = $this->db->get();
        $return = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $return[$row['id_modulo']] = $row['descripcion'];
            }
        }

            return $return;
    }
    function get_grupos(){
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
    function eliminar($id_del_grupo,$id_del_modulo){
        
         $this->db->delete('grupos_modulos', array('id_del_grupo' => $id_del_grupo ,
                                                   'id_del_modulo' =>$id_del_modulo ));
    } 

    public function insertar_permisos($data)
    {
    $condition = "id_del_grupo = ". $data['id_del_grupo'] . " and id_del_modulo = " .  $data['id_del_modulo'];
    $this->db->where($condition);
    $this->db->from('grupos_modulos');
    
  //  $this->db->limit(1);
    
    $query = $this->db->get();
    if ($query->num_rows() == 0) {

        $this->db->insert('grupos_modulos',$data);
   
        return true;
    }else    {
    return false;
       }
    }
   function actualizar_permisos($data)
    {
        $condition = "id_del_grupo = ". $data['id_del_grupo'] . " and id_del_modulo = " .  $data['id_del_modulo'];
        $this->db->where($condition);
        $this->db->update('grupos_modulos',$data);
        if ($this->db->affected_rows() > 0) 
        {
        return true;
  //      }
    } else 
    {
    return false;
    }
}
 
}
