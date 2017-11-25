<?php
/* 
 * File Name: employee_model.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class modulo_documento extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    public function get_folder($id)
    {
        $this->db->where('id', $id);
        $this->db->from('folder');
        $this->db->join('documento','documento.folder=folder.id_folder');
        $query = $this->db->get();
        return $query->result();
    }   
    public function update(){
        $doc=$this->input->post('hidden');
             $data = array(
            'folder'=>$this->input->post('id_folder')   
            );
       $this->db->where('id',$doc);
       $this->db->update('documento',$data);
       
    }
    public function get_fl()
    {
        
        $this->db->from('folder');
        $result = $this->db->get();
        $return = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $return[$row['id_folder']] = $row['nombre_folder'];
            }
        }

            return $return;
    }  
    public function get_documento_buscar()
    {
        $doc=$this->input->post('nombre');
        $this->db->from('documento');
        $this->db->where('nombre_documento',$doc);
        $this->db->join('usuarios','usuarios.id_usuario=documento.creado_por');
        $query = $this->db->get();
        return $query->result();
    }
     public function get_documento()
    {
        //$this->db->where('employee_no', $empno);
        $this->db->from('documento');
        $this->db->join('usuarios','usuarios.id_usuario=documento.creado_por');
        $query = $this->db->get();
        return $query->result();
    }	
    public function get_documento_acen()
    {
        //$this->db->where('employee_no', $empno);
        $this->db->order_by('fecha_creacion');
        $this->db->from('documento');
        $this->db->join('usuarios','usuarios.id_usuario=documento.creado_por');
        $query = $this->db->get();
        return $query->result();
    }   
    public function get_documento_des()
    {
        //$this->db->where('employee_no', $empno);
        $this->db->order_by('fecha_creacion','desc');
        $this->db->from('documento');
        $this->db->join('usuarios','usuarios.id_usuario=documento.creado_por');
        $query = $this->db->get();
        return $query->result();
    } 
   

    public function registration_insert($data) {
    

    $condition = "nombre_bodega =" . "'" . $data['nombre_bodega'] . "'";
    
    
    $this->db->from('documento');
    $this->db->where($condition);
    $this->db->limit(1);
    
    $query = $this->db->get();
    if ($query->num_rows() == 0) 
    {

        // Query to insert data in database
        $this->db->insert('documento',$data);
        if ($this->db->affected_rows() > 0) 
        {
        return true;
        }
    } else 
    {
    return false;
    }
    }

    public function nuevo($data) {
    
       $usuario=($this->session->userdata['logged_in']['id']);
        $this->db->insert('documento',$data);
        $this->db->where('creado_por',$usuario);
        $this->db->order_by('id','desc');
        $this->db->from('documento');
      //  $this->db->join('usuarios','usuarios.id_usuario=documento.creado_por');
        
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
}

    public    function logueo($id,$data){


            $usuario=($this->session->userdata['logged_in']['id']);
            $data_meta = array(
            'valor' => $data['fecha_creacion'],
            'descripcion'=>'fecha',
            'id_documento'=>$id,
            'usuario'=>$usuario
            );
            $this->db->insert('meta',$data_meta);

            $data_meta = array(
            'valor' => $data['tipo'],
            'descripcion'=>'tipo',
            'id_documento'=>$id,
            'usuario'=>$usuario
            );
            $this->db->insert('meta',$data_meta);
     }


    public function get_meta($id)
    {
        //$this->db->where('employee_no', $empno);
        $this->db->from('meta');
        $this->db->where('id_documento',$id);
        $this->db->join('usuarios','usuarios.id_usuario=meta.usuario');
        $query = $this->db->get();
        return $query->result();
    }   
   public function trae_tipos(){
        $this->db->from('meta');
        $result = $this->db->get();
        $return = array();
        if($result->num_rows() > 0) {
            foreach($result->result_array() as $row) {
                $return[$row['descripcion']] = $row['descripcion'];
            }
        }

            return $return;
    }
    public function insertar_meta($id){

    }
    public function tipos($tipo,$id)
    {   
        $this->db->from('meta');
        $this->db->where('descripcion',$tipo);
        $this->db->where('id_documento',$id);
        $query = $this->db->get();
   
            if ($this->db->affected_rows() > 0) 
            {
            return true;
            
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