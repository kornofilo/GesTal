<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Grupo extends CI_Controller
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
        $this->load->model('modulo_grupos');
    }
    function index()
    {
        
    }
    public function lista_grupos()
     {
          //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);


          //cargar los dato del usuario
          $this->load->model('modulo_grupos');  
          //traeme los usuarios
         $result = $this->modulo_grupos->get_grupos_record_all();           
          $data['grupos'] = $result;
          //load the department_view
          $this->load->view('grupos/lista_grupos',$data);
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

     public function grupo_registration() 
      {
  
           //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);


          $modulo="grupos";
          $this->load->model('modulo_grupos');  
          $result = $this->modulo_grupos->tiene_permiso($modulo,"i"); 
           
          if ($result==true) {
              $this->load->view('grupos/nuevo_grupo');
          }else{
           
           redirect('grupo/lista_grupos');
          }
        
      }

      // Validate and store registration data in database
      public function nuevo_grupo() 
      {
        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('departamento', 'Departamento', 'trim|required|xss_clean');
       
        if ($this->form_validation->run() == FALSE) 
        {
          $this->load->view('nuevo_grupo');
        } 
        else
        {
            $data = array(
            'nombre_grupo' => $this->input->post('nombre'),
            'departamento' => $this->input->post('departamento'),
            
            );
            $this->load->model('modulo_grupos');
            $result = $this->modulo_grupos->registration_insert($data);
          if ($result == TRUE) 
          {
            redirect('grupo/lista_grupos'); 
          } 
          else 
          {
            redirect('grupo/lista_grupos'); 
          }
        }
      }
     
    
}
?>