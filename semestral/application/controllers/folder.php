<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Folder extends CI_Controller
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
        $this->load->model('modulo_folder');
    }
    function index()
    {
        
    }
    public function lista_folder()
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


          //cargar los dato del usuario
          $this->load->model('modulo_folder');  
          //traeme los usuarios
          $result = $this->modulo_folder->get_folder();           
          $data['usuarios'] = $result;

          //carga vista de usuarios
          $this->load->view('folder/lista_folder',$data);
     }
     public function eliminar($id_usuario)
     {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
          
          $modulo="usuarios";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"d"); 
           
          if ($result==true) {
            $result = $this->modulo_usuarios->eliminar($id_usuario);
           
            redirect('folder/lista_folder'); 
          }else{
           
           redirect('folder/lista_folder');
          }
     }

     public function folder_registration() 
      {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
  
           //nav bar //no se toca
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);
          //

          $modulo="folder";
          $this->load->model('modulo_folder');  
          $result = $this->modulo_folder->tiene_permiso($modulo,"i"); 
      
          if ($result==true) {

              $this->load->model('modulo_estante'); 
              $bodegas = $this->modulo_estante->trae_bodegas();
              $data['bodegas'] = $bodegas;
              $est = $this->modulo_estante->trae_estantes();
              $data['estantes'] = $est;
              $cj = $this->modulo_estante->trae_cajas();
              $data['cajas'] = $cj;
              $this->load->view('folder/nuevo_folder',$data);
          }else{
           
           redirect('folder/lista_folder');
          }
        
      }
      // Campos para validar
      // Validate and store registration data in database
      public function nuevo_folder() 
      { if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
        // Check validation for user input in SignUp form
       
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idestante', 'Idestante', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idcaja', 'Idcaja', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idbodega', 'Idbodega', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) 
        {
          $this->load->view('nuevo_folder');
        } 
        else  
        {   $uno=1;
            $data = array(
            'nombre_folder' => $this->input->post('nombre'),
            'id_de_estante'=> $this->input->post('idestante'),
            'id_de_caja'=>$this->input->post('idcaja'),
            'estado'=>$uno,
            'id_de_bodega'=>$this->input->post('idbodega')
            );
            $this->load->model('modulo_folder');
            $result = $this->modulo_folder->registration_insert($data);
          if ($result == TRUE) 
          {
            redirect('folder/lista_folder'); 
          } 
          else 
          {
            redirect('folder/lista_folder'); 
          }
        }
      }
     
    
}
?>