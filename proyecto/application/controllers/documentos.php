<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Documentos extends CI_Controller
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
        $this->load->model('modulo_documento');
    }
    public function generar_direccion() 
      {
  
           //nav bar //no se toca
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);
          //

          $modulo="documentos";
          $this->load->model('modulo_documento');  
          $result = $this->modulo_documento->tiene_permiso($modulo,"i"); 
      
          if ($result==true) {
              $this->load->view('documentos/nuevo_documento');
          }else{
           
           redirect('documentos/lista_documentos');
          }
        
      }
    public function lista_documentos()
     {
          //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);


          //cargar los dato del usuario
          $this->load->model('modulo_documento');  
          //traeme los usuarios
          $result = $this->modulo_documento->get_documento();           
          $data['usuarios'] = $result;

          //carga vista de usuarios
          $this->load->view('documentos/lista_documentos',$data);
     }
     public function eliminar($id_usuario)
     {
          
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

     public function documento_registration() 
      {
  
           //nav bar //no se toca
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);
          //

          $modulo="documentos";
          $this->load->model('modulo_documento');  
          $result = $this->modulo_documento->tiene_permiso($modulo,"i"); 
      
          if ($result==true) {
              $this->load->view('documentos/nuevo_documento');
          }else{
           
           redirect('documentos/lista_documentos');
          }
        
      }
      // Campos para validar
      // Validate and store registration data in database
      public function nuevo_folder() 
      { 
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