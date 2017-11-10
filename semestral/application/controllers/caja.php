<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Caja extends CI_Controller
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
        $this->load->model('modulo_caja');
    }
    function index()
    {
        
    }
    public function lista_caja()
     {
          //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);


          //cargar los dato del usuario
          $this->load->model('modulo_caja');  
          //traeme los usuarios
          $result = $this->modulo_caja->get_caja();           
          $data['usuarios'] = $result;

          //carga vista de usuarios
          $this->load->view('caja/lista_caja',$data);
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

     public function caja_registration() 
      {
  
           //nav bar //no se toca
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);
          //

          $modulo="cajas";
          $this->load->model('modulo_caja');  
          $result = $this->modulo_caja->tiene_permiso($modulo,"i"); 
           
          if ($result==true) {
              $this->load->view('caja/nueva_caja');
          }else{  
             
           redirect('caja/lista_caja');
          }
        
      }
      // Campos para validar
      // Validate and store registration data in database
      public function nueva_caja() 
      { 
        // Check validation for user input in SignUp form
        $uno=1;
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idestante', 'Idestante', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idbodega', 'Idbodega', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) 
        {
          $this->load->view('nueva_caja');
        } 
        else
        {
            $data = array(
            'estado' => $uno,
            'nombre_caja' => $this->input->post('nombre'),
            'id_de_estante' => $this->input->post('idestante'),
            'id_de_bodega' => $this->input->post('idbodega')
            );
            $this->load->model('modulo_caja');
            $result = $this->modulo_caja->registration_insert($data);
          if ($result == TRUE) 
          {
            redirect('caja/lista_caja'); 
          } 
          else 
          {
            redirect('caja/lista_caja'); 
          }
        }
      }
     
    
}
?>