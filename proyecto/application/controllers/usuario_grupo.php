<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuario_grupo extends CI_Controller
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
        $this->load->model('modulo_usuarios');
    }
    function index()
    {
        
    }
    public function lista_usuarios_grupos()
     {
          //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);


          //cargar los dato del usuario
          $this->load->model('modulo_grupo_usuario');  
          //traeme los usuarios
          $result = $this->modulo_grupo_usuario->get_usuarios_record_all();           
          $data['usuarios'] = $result;

          //carga vista de usuarios
          $this->load->view('grupo_usuario/lista_grupo_usuario',$data);
     }
     
     public function lista_usuarios_grupos_sin()
     {
          //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);


          //cargar los dato del usuario
          $this->load->model('modulo_grupo_usuario');  
          //traeme los usuarios
          $result = $this->modulo_grupo_usuario->get_usuarios_sin();           
          $data['usuarios'] = $result;

          //carga vista de usuarios
          $this->load->view('grupo_usuario/lista_grupo_usuario',$data);
     }
 
     public function show_grupo($id_usuario) 
      {
  
           //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);


          $modulo="usuarios_grupos";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"i"); 
           
          if ($result==true) {
              $this->load->model('modulo_grupo_usuario'); 
              $result = $this->modulo_grupo_usuario->get_dropdown_list();           
              $data['grupo'] = $result;
              $this->load->view('grupo_usuario/grupo',$data);
          }else{
           
           redirect('lista_usuarios_grupos');
          }
        
      }
public function actualiza_grupo() 
      {
        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('id_usuario', 'Id_usuario', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_del_grupo', 'Id_del_grupo', 'trim|required|xss_clean');
       
        if ($this->form_validation->run() == FALSE) 
        {
          redirect('lista_usuarios_grupos');
        } 
        else
        {   
            $id_usuario=$this->input->post('id_usuario');
            $id_del_grupo=$this->input->post('id_del_grupo');
          
            $this->load->model('modulo_grupo_usuario');
            $this->modulo_grupo_usuario->actualiza($id_usuario,$id_del_grupo);
         
            redirect('usuario_grupo/lista_usuarios_grupos');
          
        }
      }
   
     
    
}
?>