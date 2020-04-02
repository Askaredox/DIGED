<?php
/*todo para crear usuarios */

class Admin_Docente_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }


    public function  existsDocente($data){

        $sql = $this->db->get_where('USUARIO', $data);
        if ($sql->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function createDocente($data){
        $sql = $this->db->insert('USUARIO',  $data);
        return $sql;
    }

    public function getDocentes(){
        $query = $this->db->get_where('USUARIO',array('Tipo'=>2));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

    public function UpdateDocente($id, $datos)
    {
        $this->db->set($datos);
        $this->db->where('Id_Usuario',$id);
        $query=$this->db->update('USUARIO');
        return $query;
    }
    public function DeleteDocente($data){
        $query=$this -> db -> delete ( 'USUARIO',$data);  
        return $query;
       // var_dump($query);
    }
}
