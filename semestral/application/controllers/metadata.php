<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Metadata extends CI_Controller
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
        $this->load->model('modulo_metadata');
    }
    public function generar_direccion() 
      {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
  
        
      }
    public function lista_metadata()
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

          $modulo="metadata";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"s"); 
          if ($result==true) {
          $this->load->model('modulo_metadata');  
          $result = $this->modulo_metadata->get_meta();           
          $data['usuarios'] = $result;

          $this->load->view('metadata/lista_metadata',$data);
        }else{
          $data['usuarios'] = $result;
          $this->load->view('metadata/lista_metadata',$data);
        }
     }
    

     public function registrar_metadata() 
      {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
         //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);


          $modulo="metadata";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"i"); 
           
          if ($result==true) {
              $this->load->view('metadata/nueva');
          }else{
           redirect('metadata/lista_metadata');
          }
        
      }
      // Campos para validar
      // Validate and store registration data in database
      public function nueva_metadata() 
      { if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) 
        {
          redirect('metadata/registrar_metadata'); 
        } 
        else

        {   
             $tipo=$this->input->post('nombre');
             $this->load->model('modulo_metadata');  
             $result = $this->modulo_metadata->tipos($tipo); 
           if ($result==true) {
             redirect('metadata/registrar_metadata'); 
           }else{

            $uno=1;
            $cero=0;
            $data = array(
            'descripcion' => $this->input->post('nombre'),
            'valor' => $cero,
            'id_documento' => $cero,
            'usuario' => $cero,
            );
            $this->load->model('modulo_metadata');
            $result = $this->modulo_metadata->registration_insert($data);
            redirect('metadata/lista_metadata'); 
        }
        }
      }
     
    
}
?>