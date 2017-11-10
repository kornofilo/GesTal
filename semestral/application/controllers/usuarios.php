<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuarios extends CI_Controller
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
    public function lista_usuarios()
     {
          //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);


          //cargar los dato del usuario
          $this->load->model('modulo_usuarios');  
          //traeme los usuarios
          $result = $this->modulo_usuarios->get_usuarios_record_all();           
          $data['usuarios'] = $result;

          //carga vista de usuarios
          $this->load->view('usuarios/lista_usuarios',$data);
     }
     public function eliminar($id_usuario)
     {
          
          $modulo="usuarios";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"d"); 
           
          if ($result==true) {
            $result = $this->modulo_usuarios->eliminar($id_usuario);
           
            redirect('usuarios/lista_usuarios'); 
          }else{
           
           redirect('usuarios/lista_usuarios');
          }
     }

     public function user_registration_show() 
      {
  
           //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);


          $modulo="usuarios";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"i"); 
           
          if ($result==true) {
              $this->load->view('usuarios/nuevo_usuario');
          }else{
           
           redirect('usuarios/lista_usuarios');
          }
        
      }

      // Validate and store registration data in database
      public function new_user_registration() 
      {
        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cedula', 'Cedula', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|xss_clean');
        $this->form_validation->set_rules('correo', 'correo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('id_del_grupo', 'grupo', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) 
        {
          $this->load->view('nuevo_usuario');
        } 
        else
        {   $uno=1;
            $data = array(
            'nombre' => $this->input->post('nombre'),
            'cedula' => $this->input->post('cedula'),
            'telefono' => $this->input->post('telefono'),
            'correo' => $this->input->post('correo'),
            'id_del_grupo' => $this->input->post('id_del_grupo'),
            'estado' => $uno,
            'password' => $this->input->post('password')
            );
            $this->load->model('modulo_usuarios');
            $result = $this->modulo_usuarios->registration_insert($data);
          if ($result == TRUE) 
          {
            redirect('usuarios/lista_usuarios'); 
          } 
          else 
          {
            redirect('usuarios/lista_usuarios'); 
          }
        }
      }
     
    
}
?>