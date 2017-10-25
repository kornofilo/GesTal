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
     {
          //load the department_model
          $this->load->model('modulo_usuarios');  
  
          //call the model function to get the department data
          $result = $this->modulo_usuarios->get_usuarios_record_all();           
          $data['usuarios'] = $result;
          //load the department_view
          $this->load->view('usuarios/lista_usuarios',$data);
     }
    
}
?>