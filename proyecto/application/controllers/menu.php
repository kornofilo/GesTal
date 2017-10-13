<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class menu extends CI_Controller {
     public function __construct()
     {
          parent::__construct();
          $this->load->helper('url');
          $this->load->database();
		      $this->load->library('form_validation');
		      $this->load->library('session');
     }

     public function version1()
     {
            $data['menu'] = menu_ul('home');
		      	$this->load->view('menu_view', $data);
     }
     
	      public function version2()
     {
            $data['menu'] = menu_ul('home');
	      		$this->load->view('menu2_view', $data);
     }
	 public function lista_departamentos()
     {
          //load the department_model
          $this->load->model('department_model');  
          //call the model function to get the department data
          $deptresult = $this->department_model->get_department_list();           
          $data['deptlist'] = $deptresult;
          //load the department_view
          $this->load->view('department_list_view',$data);
     }
	 
	 function insert()
    {
        //fetch data from department and designation tables
        
        $this->form_validation->set_rules('departmentid', 'Id Departmento', 'trim');
        $this->form_validation->set_rules('departmentname', 'Nombre del Departamento', 'trim|required|xss_clean|callback_alpha_only_space');
        //$this->form_validation->set_rules('department', 'Department', 'callback_combo_check');
        //$this->form_validation->set_rules('designation', 'Designation', 'callback_combo_check');
        //$this->form_validation->set_rules('hireddate', 'Hired Date', 'required');
        //$this->form_validation->set_rules('salary', 'Salary', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            //fail validation
            $this->load->view('department_insert', $data);
        }
        else
        {    
            //pass validation
            $data = array(
                'department_id' => $this->input->post('departmentid'),
                'department_name' => $this->input->post('departmentname'),
                
            );

            //insert the form data into database
            $this->db->insert('tbl_department', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Detalle del Departamento Agregado!!!</div>');
            redirect('department/lista_departamentos');
        }

    }
     function alpha_only_space($str)
    {
        if (!preg_match("/^([-a-z ])+$/i", $str))
        {
            $this->form_validation->set_message('alpha_only_space', 'The %s field must contain only alphabets or spaces');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
