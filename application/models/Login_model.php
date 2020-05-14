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
        }else{
            $r= $query->row();

            if($r->Contraseña==$datos['Contraseña']){//verificar que sean exactamente iguales mayusculas y minusculas
                return $query->row();
            }else{
                return FALSE;
            }
        }

    }


}