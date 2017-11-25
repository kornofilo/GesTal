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


          $modulo="usuarios";
          $this->load->model('modulo_usuarios');  
          $r = $this->modulo_usuarios->tiene_permiso($modulo,"s");
          
          if ($r==true) {
            $data['ver']=1;
          }else{
            $data['ver']=0;
          }
          $result = $this->modulo_usuarios->get_usuarios_record_all();           
          $data['usuarios'] = $result;

        
          $this->load->view('usuarios/lista_usuarios',$data);
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
           
            redirect('usuarios/lista_usuarios'); 
          }else{
           
           redirect('usuarios/lista_usuarios');
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
      {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
        // Check validation for user input in SignUp form
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cedula', 'Cedula', 'trim|required|xss_clean');
        $this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|xss_clean');
        $this->form_validation->set_rules('correo', 'correo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) 
        {
          $this->load->view('nuevo_usuario');
        } 
        else
        {   $uno=1;
            $cero=0;
            $data = array(
            'nombre' => $this->input->post('nombre'),
            'cedula' => $this->input->post('cedula'),
            'telefono' => $this->input->post('telefono'),
            'correo' => $this->input->post('correo'),
            'id_del_grupo' =>$cero,
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
      function editar($id_usuario){
      if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);

          $modulo="usuarios";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"u");

          if ($result==true){
          $data['data']=$this->modulo_usuarios->editar($id_usuario);
          $this->load->view('usuarios/editar_usuario',$data);
          }else{
            redirect('usuarios/lista_usuarios');
          }

        }

          function update($id_usuario){
            if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
            $result=$this->modulo_usuarios->update($id_usuario);
            redirect('usuarios/lista_usuarios');
          }
     
    
}
?>