<?php

Class login_database extends CI_Model {
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
// Insert registration data in database

function get_modulos_record_all()
    {
    	$id_usuario=($this->session->userdata['logged_in']['id']);

        $this->db->from('grupos_modulos');
        $this->db->join('usuarios','grupos_modulos.id_del_grupo=usuarios.id_del_grupo');
        $this->db->join('modulos','grupos_modulos.id_del_modulo=modulos.id_modulo');
        $this->db->where('id_usuario',$id_usuario);
        $query = $this->db->get();
        return $query->result();
    }	


public function registration_insert($data) {
	

	// Query to check whether username already exist or not
	$condition = "nombre =" . "'" . $data['user_name'] . "'";
	//$this->db->select('*');
	
	$this->db->from('usuarios');
	$this->db->where($condition);
	$this->db->limit(1);
	
	$query = $this->db->get();
	if ($query->num_rows() == 0) 
	{

		// Query to insert data in database
		$this->db->insert('usuarios', $data);
		if ($this->db->affected_rows() > 0) 
		{
		return true;
		}
	} else 
	{
	return false;
	}
}

// Read data using username and password
public function login($data) {

$condition = "nombre =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('usuarios');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

// Read data from database to show data in admin page
public function read_user_information($username) {

$condition = "nombre =" . "'" . $username . "'";
$this->db->select('*');
$this->db->from('usuarios');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return $query->result();
} else {
return false;
}
}

}

?>