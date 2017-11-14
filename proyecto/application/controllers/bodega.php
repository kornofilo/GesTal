<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bodega extends CI_Controller
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
        $this->load->model('modulo_bodega');
    }
    function index()
    {
        
    }
    public function lista_bodega()
     {
          //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);


          //cargar los dato del usuario
          $this->load->model('modulo_bodega');  
          //traeme los usuarios
          $result = $this->modulo_bodega->get_bodega();           
          $data['usuarios'] = $result;

          //carga vista de usuarios
          $this->load->view('bodega/lista_bodega',$data);
     }
     
     public function bodega_registration() 
      {
  
           //nav bar //no se toca
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);
          //

          $modulo="bodega";
          $this->load->model('modulo_bodega');  
          $result = $this->modulo_bodega->tiene_permiso($modulo,"i"); 
           
          if ($result==true) {
              $this->load->view('bodega/nueva_bodega');
          }else{
           
           redirect('bodega/lista_bodega');
          }
        
      }
      // Campos para validar
      // Validate and store registration data in database
      public function nueva_bodega() 
      { 
        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('direccion', 'Direccion', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) 
        {
          $this->load->view('nueva_bodega');
        } 
        else
        {
            $data = array(
            'nombre_bodega' => $this->input->post('nombre'),
            'direccion' => $this->input->post('direccion')
            );
            $this->load->model('modulo_bodega');
            $result = $this->modulo_bodega->registration_insert($data);
          if ($result == TRUE) 
          {
            redirect('bodega/lista_bodega'); 
          } 
          else 
          {
            redirect('bodega/lista_bodega'); 
          }
        }
      }
     
    
}
?>