<?php
/*todo para crear usuarios */

class Login_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function loginUser($datos)
    {
        $query = $this->db->get_where('USUARIO', array('Id_Usuario' => $datos['Nombre'],'Contraseña'=>$datos['Contraseña']), 1);
        if(!$query->result()){
           return FALSE;
        }
        return $query->row();
    }


}