<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Grupos_modulos extends CI_Controller
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
        $this->load->model('modulo_model');
    }
    function index()
    {
        
    }
    public function lista_modulos()
     {

          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);
          
          $this->load->model('modulo_model');  
          $grt = $this->modulo_model->get_grupos();
          $data['grupos']  = $grt;
          $result = $this->modulo_model->get_productos_record_all();
          $data['modelos'] = $result;
          //load the department_view
          $this->load->view('grupos_modulos/modulo_view',$data);

          
     }
     public function lista_modulo()
     {
          

          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);
          

          $this->form_validation->set_rules('id_del_grupo', 'Id_del_grupo', 'trim|required|xss_clean');
          $id_del_grupo=$this->input->post('id_del_grupo');

          $this->load->model('modulo_model');  
          $grt = $this->modulo_model->get_grupos();
          $data['grupos']  = $grt;

          
          $result = $this->modulo_model->get_modulos($id_del_grupo);
          $data['modelos'] = $result;
          //load the department_view
          $this->load->view('grupos_modulos/modulo_view',$data);

          
     }
     public function eliminar($id_del_grupo,$id_del_modulo){
          $modulo="grupos_modulos";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"d"); 
           
          if ($result==true) {
            $this->load->model('modulo_model'); 
            $this->modulo_model->eliminar($id_del_grupo,$id_del_modulo);
           
            redirect('grupos_modulos/lista_modulos'); 
          }else{
           echo"<script>alert('usted no tiene permiso para eliminar');</script>";
           redirect('grupos_modulos/lista_modulos'); 
          }
     }
    
}
?>