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
    public function buscar()
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


          $modulo="documentos";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"s"); 
          if ($result==true) {
          $this->load->model('modulo_documento');  
          
          $result = $this->modulo_documento->get_documento_buscar();           
          $data['usuarios'] = $result;
          $this->load->view('documentos/lista_documentos',$data);
        }else{
          $data['usuarios'] = $result;
          $this->load->view('documentos/lista_documentos',$data);
        }
     }
    public function acendente()
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


          $modulo="documentos";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"s"); 
          if ($result==true) {
          $this->load->model('modulo_documento');  
       
          $result = $this->modulo_documento->get_documento_acen();           
          $data['usuarios'] = $result;
          $this->load->view('documentos/lista_documentos',$data);
        }else{
          $data['usuarios'] = $result;
          $this->load->view('documentos/lista_documentos',$data);
        }
     }
     public function decendente()
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


          $modulo="documentos";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"s"); 
          if ($result==true) {
          $this->load->model('modulo_documento');  
       
          $result = $this->modulo_documento->get_documento_des();           
          $data['usuarios'] = $result;
          $this->load->view('documentos/lista_documentos',$data);
        }else{
          $data['usuarios'] = $result;
          $this->load->view('documentos/lista_documentos',$data);
        }
     }
    public function direccion($id){
      if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
           //nav bar //no se toca
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);
          //
          $this->load->model('modulo_documento');  
          //traeme los usuarios
          $result = $this->modulo_documento->get_folder($id);           
          $data['usuarios'] = $result;
          $result = $this->modulo_documento->get_fl();           
          $data['fl'] = $result;
          $this->load->view('documentos/direccion',$data);


    }

    public function actualizar_dir() 
      {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
  
           //nav bar //no se toca
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);
         
          
            
            $this->load->model('modulo_documento');
            $this->modulo_documento->update($data,$doc);
           

           redirect('documentos/lista_documentos');
          
        
      }
    public function lista_documentos()
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


          $modulo="documentos";
          $this->load->model('modulo_usuarios');  
          $result = $this->modulo_usuarios->tiene_permiso($modulo,"s"); 
          if ($result==true) {
          $this->load->model('modulo_documento');  
       
          $result = $this->modulo_documento->get_documento();           
          $data['usuarios'] = $result;
          $this->load->view('documentos/lista_documentos',$data);
        }else{
          $data['usuarios'] = $result;
          $this->load->view('documentos/lista_documentos',$data);
        }
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

     public function documento_registration() 
      {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
  
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
              $this->load->view('documentos/nuevo_docuemento');
          }else{
           
           redirect('documentos/lista_documentos');
          }
        
      }
      // Campos para validar
      // Validate and store registration data in database
      public function nuevo_doc() 
      { if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
        // Check validation for user input in SignUp form
       
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha', 'Fecha', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tipo', 'Tipo', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) 
        {
          $this->load->view('nuevo_documento');
        } 
        else
        {   
          $uno=1;
          $cero=0;
          $now= date("Y-m-d H:i:s");
          $usuario=($this->session->userdata['logged_in']['id']);
            $data = array(
            'version' => $uno,
            'estado'=> $uno,
            'fecha_creacion'=>$this->input->post('fecha'),
            'creado_por '=>$usuario,
            'fecha_subida'=>$now,
            'nombre_documento'=>$this->input->post('nombre'),
            'folder'=>$cero,
            'tipo'=>$this->input->post('tipo')
            );
            $this->load->model('modulo_documento');
            $result = $this->modulo_documento->nuevo($data);
             $id=$result[0]->id;
             $this->modulo_documento->logueo($id,$data);
            redirect('documentos/lista_documentos'); 
           
          
        }
      }

      public function lista_metadata($id)
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


          $this->load->model('modulo_documento');  
          $result = $this->modulo_documento->get_meta($id);           
          $data['usuarios'] = $result;

          //carga vista de usuarios
          $this->load->view('documentos/lista_metadata',$data);
     }

     function nueva_metadata(){
      if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }
  
           //nav bar //no se toca
          $this->load->model('login_database');  
          $result = $this->login_database->get_modulos_record_all(); 
                       
          $session_data = array('modulos' => $result);

          $this->session->set_userdata('nav', $session_data);
          //
          $this->load->model('modulo_documento');
          $t= $this->modulo_documento->trae_tipos();
          $data['tipos'] = $t;

          $this->load->view('documentos/nueva_metadata',$data);
          
     }
    function registro_nuevo($id)
    {if (!(isset($this->session->userdata['logged_in']))) {
          redirect('user_authentication/user_login_process'); 
           }

      $this->form_validation->set_rules('tipos', 'Tipos', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) 
        {
           redirect('documentos/lista_documentos'); 
        } 
        else

        {   
             $tipo=$this->input->post('tipos');
             $this->load->model('modulo_documento');  
             $result = $this->modulo_documento->tipos($tipo,$id); 
           if ($result==true) {
             redirect('documentos/registro_nuevo'); 
           }else{

            $uno=1;
            $cero=0;
            $data = array(
            'descripcion' => $this->input->post('tipos'),
            'valor' => $this->input->post('descripcion'),
            'id_documento' => $id,
            'usuario' => $this->session->userdata['logged_in']['id']
            );
            $this->load->model('modulo_metadata');
            $result = $this->modulo_metadata->registration_insert($data);
            redirect('documentos/lista_documentos'); 
        }
        }

    }

     
    
}
?>