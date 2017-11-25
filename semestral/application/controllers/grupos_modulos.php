<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Grupos_modulos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        //load the employee model
        $this->load->model('modulo_model');
    }
    function index()
    {
        
    }
    public function lista_modulos()
     {
          if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);
          

          $modulo="grupos_modulos";
          $this->load->model('modulo_usuarios');  
          $r = $this->modulo_usuarios->tiene_permiso($modulo,"s");
          
          if ($r==true) {
            $data['ver']=1;
          }else{
            $data['ver']=0;
          }



          $this->load->model('modulo_model');  
          $grt = $this->modulo_model->get_grupos();
          $data['grupos']  = $grt;

          $result = $this->modulo_model->get_productos_record_all();
          $data['modelos'] = $result;
          //carga la vissta
          $this->load->view('grupos_modulos/modulo_view',$data);

          
     }
     public function nuevo_modulo()
     {
          if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);
          
          $modulo="grupos_modulos";
          $this->load->model('modulo_usuarios');  
          $r = $this->modulo_usuarios->tiene_permiso($modulo,"i");
          
          if ($r==true) {
            
          $this->form_validation->set_rules('id_del_grupo', 'Id_del_grupo', 'trim|required|xss_clean');
          $id_del_grupo=$this->input->post('id_del_grupo');
           
          $data['id_del_grupo']=$id_del_grupo;
           
          $mdl = $this->modulo_model->trae_modelos();
          $data['modulos'] = $mdl;
          //carga la vissta
          $this->load->view('grupos_modulos/gp_view',$data);
          }
          else{
            redirect('grupos_modulos/lista_modulos'); 
          }

          
     }
      public function insertar_permisos()
     {

      if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
           
           $s=$this->input->post('selecionar');
           $i=$this->input->post('inserar');
           $u=$this->input->post('actualizar');
           $d=$this->input->post('eliminar');
           
          if ($s==='') {
           $s=1;
          }else{$s=0;}

          if ($i==='') {
           $i=1;
          }else{$i=0;}

          if ($u==='') {
           $u=1;
          }else{$u=0;}

          if ($d==='') {
           $d=1;
          }else{$d=0;}
           $data = array(
            's' => $s,
            'i' => $i,
            'u' => $u,
            'd' => $d,
            'id_del_grupo' =>$this->input->post('id_del_grupo'),
            'id_del_modulo' =>$this->input->post('id_modulo')
            );
            $this->load->model('modulo_model');
            $result = $this->modulo_model->insertar_permisos($data);
          if ($result==true) {
            redirect('grupos_modulos/lista_modulos');
          }else{
            redirect('grupos_modulos/lista_modulos');
          }
     }
     public function lista_modulo()
     {

      if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);
          $modulo="grupos_modulos";
          $this->load->model('modulo_usuarios');  
          $r = $this->modulo_usuarios->tiene_permiso($modulo,"s");
          
          if ($r==true) {
            $data['ver']=1;
          }else{
            $data['ver']=0;
          }
          

          $this->form_validation->set_rules('id_del_grupo', 'Id_del_grupo', 'trim|required|xss_clean');
          $id_del_grupo=$this->input->post('id_del_grupo');

          $this->load->model('modulo_model');  
          $grt = $this->modulo_model->get_grupos();
          $data['grupos']  = $grt;

          
          $result = $this->modulo_model->get_modulos($id_del_grupo);
          $data['modelos'] = $result;
          //load the department_view
          $this->load->view('grupos_modulos/modulo_view',$data);

          
     }
     public function eliminar($id_del_grupo,$id_del_modulo){

      if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
          $modulo="grupos_modulos";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"d"); 
           
          if ($result==true) {
            $this->load->model('modulo_model'); 
            $this->modulo_model->eliminar($id_del_grupo,$id_del_modulo);
           
            redirect('grupos_modulos/lista_modulos'); 
          }else{
           redirect('grupos_modulos/lista_modulos'); 
          }
     }
     public function update(){
       $s=$this->input->post('selecionar');
           $i=$this->input->post('inserar');
           $u=$this->input->post('actualizar');
           $d=$this->input->post('eliminar');
           
          if ($s==='') {
           $s=1;
          }else{$s=0;}

          if ($i==='') {
           $i=1;
          }else{$i=0;}

          if ($u==='') {
           $u=1;
          }else{$u=0;}

          if ($d==='') {
           $d=1;
          }else{$d=0;}
           $data = array(
            's' => $s,
            'i' => $i,
            'u' => $u,
            'd' => $d,
            'id_del_grupo' =>$this->input->post('id_del_grupo'),
            'id_del_modulo' =>$this->input->post('id_del_modulo')
            );
            $this->load->model('modulo_model');
            $result = $this->modulo_model->actualizar_permisos($data);
          if ($result==true) {
            redirect('grupos_modulos/lista_modulos');
          }else{
            redirect('grupos_modulos/lista_modulos');
          }
     }
     public function editar($id_del_grupo,$id_del_modulo){

      if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
           $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);

          $modulo="grupos_modulos";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"u"); 
           
          if ($result==true) {
           $result = $this->modulo_model->get_gruposymodulos($id_del_grupo,$id_del_modulo);
           $data['grupos'] = $result;
           $this->load->view('grupos_modulos/edit',$data);
          }else{
           redirect('grupos_modulos/lista_modulos'); 
          }
     }
    
}
?>