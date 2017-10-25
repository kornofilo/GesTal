<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modulo extends CI_Controller
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
          //load the department_model
          $this->load->model('modulo_model');  
          
    
          //call the model function to get the department data
          $result = $this->modulo_model->get_productos_record_all();           
          $data['modelos'] = $result;
          //load the department_view
          $this->load->view('modulo_view',$data);

          
     }
    
}
?>