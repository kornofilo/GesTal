<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Grupos extends CI_Controller
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
        $this->load->model('modulo_grupos');
    }
    function index()
    {
        
    }
    public function lista_grupos()
     {

      $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);
          //load the department_model
          $this->load->model('modulo_grupos');  
  
          //call the model function to get the department data
          $result = $this->modulo_grupos->get_grupos_record_all();           
          $data['grupos'] = $result;
          //load the department_view
          $this->load->view('grupos/lista_grupos',$data);
     }
    
}
?>