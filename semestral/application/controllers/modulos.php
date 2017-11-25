<?php
/* 
 * File Name: modulos control.php
 * este controlador se encarga de jode la paciencia y controlar los modulos
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        //carga el modulo de modulos
        $this->load->model('modulo_modulos');
    }
    function index()
    {
        
    }
    public function ver_modulo()
    //carga la ver de modulos
     {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
          //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);


          //cargar los dato de los modulos
          $this->load->model('modulo_modulos');  
          //traeme los los modulos
          $result = $this->modulo_modulos->get_modulos_record_all();           
          $data['modulos'] = $result;

          //carga vista de modulos
          $this->load->view('modulos/ver_modulos',$data);
     }
     public function eliminar($id_usuario)
     {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
          
          $modulo="modulos";
          $this->load->model('modulo_modulos');  
          $result = $this->modulo_modulos->tiene_permiso($modulo,"d"); 
           
          if ($result==true) {
            $result = $this->modulo_modulos->eliminar($id_usuario);
           
            redirect('modulos/ver_modulos'); 
          }else{
           
           redirect('modulos/ver_modulos');
          }
     }

     public function user_registration_show() 
      {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
  
           //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);


          $modulo="modulos";
          $this->load->model('modulo_modulos');  
          $result = $this->modulo_modulos->tiene_permiso($modulo,"i"); 
           
          if ($result==true) {
              $this->load->view('modulos/nuevo_usuario');
          }else{
           
           redirect('modulos/ver_modulos');
          }
        
      }

      // Validate and store registration data in database
      public function new_user_registration() 
      {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
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
        {
            $data = array(
            'nombre' => $this->input->post('nombre'),
            'cedula' => $this->input->post('cedula'),
            'telefono' => $this->input->post('telefono'),
            'correo' => $this->input->post('correo'),
            'id_del_grupo' => $this->input->post('id_del_grupo'),
            'password' => $this->input->post('password')
            );
            $this->load->model('modulo_modulos');
            $result = $this->modulo_modulos->registration_insert($data);
          if ($result == TRUE) 
          {
            redirect('modulos/ver_modulos'); 
          } 
          else 
          {
            redirect('modulos/ver_modulos'); 
          }
        }
      }
     
    
}
?>