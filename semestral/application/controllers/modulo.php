<?php
/* 
 * File Name: modulos control.php
 * este controlador se encarga de jode la paciencia y controlar los modulos
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
        //carga el modulo de modulos
        $this->load->model('modulo_modulos');
    }
    function index()
    {
        
    }
    public function ver_modulo()
    //carga la ver de modulos
     {
          //nav bar
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array(
            'modulos' => $result
          );
          $this->session->set_userdata('nav', $session_data);


          //cargar los dato de los modulos
          $this->load->model('modulo_modulos');  
          //traeme los los modulos
          $result = $this->modulo_modulos->get_modulos_record_all();           
          $data['modulos'] = $result;

          //carga vista de modulos
          $this->load->view('modulos/ver_modulos',$data);
     }
    

    

      
     
    
}
?>