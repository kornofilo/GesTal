<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Estante extends CI_Controller
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
        $this->load->model('modulo_estante');
    }
    function index()
    {
        
    }
    public function lista_estante()
     {
          //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);


          //cargar los dato del usuario
          $this->load->model('modulo_estante');  
          //traeme los usuarios
          $result = $this->modulo_estante->get_estante();           
          $data['usuarios'] = $result;

          //carga vista de usuarios
          $this->load->view('estante/lista_estante',$data);
     }
     public function eliminar($id_usuario)
     {
          
          $modulo="estante";
          $this->load->model('modulo_estante');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"d"); 
           
          if ($result==true) {
            $result = $this->modulo_usuarios->eliminar($id_usuario);
           
            redirect('estante/lista_estante'); 
          }else{
           
           redirect('estante/lista_estante');
          }
     }

     public function estante_registration() 
      {
  
           //nav bar //no se toca
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);
          //

          $modulo="estante";
          $this->load->model('modulo_estante');  
          $result = $this->modulo_estante->tiene_permiso($modulo,"i"); 
      
          if ($result==true) {
              $this->load->view('estante/nuevo_estante');
          }else{
           
           redirect('estante/lista_estante');
          }
        
      }
      // Campos para validar
      // Validate and store registration data in database
      public function nuevo_estante() 
      { 
        // Check validation for user input in SignUp form
         
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idbodega', 'Idbodega', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) 
        {
          $this->load->view('nuevo_estante');
        } 
        else
        {   
            $uno=1;
            $data = array(
            'estado' => $uno,
            'nombre_estante' => $this->input->post('nombre'),
            'id_de_bodega' => $this->input->post('idbodega')
            );
            $this->load->model('modulo_estante');
            $result = $this->modulo_estante->registration_insert($data);
          if ($result == TRUE) 
          {
            redirect('estante/lista_estante'); 
          } 
          else 
          {
            redirect('estante/lista_estante'); 
          }
        }
      }
     
    
}
?>