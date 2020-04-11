<?php
/*todo para crear usuarios */

class Docente_Temas_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function getTemas($data) //segun el curso que seleccione el doceente
    {
      //  var_dump($data);
        $query = $this->db->get_where('TEMA', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

    public function ExistsTema($data)
    {
        $sql = $this->db->get_where('TEMA', $data);
        if ($sql->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function CreateTema($data)
    {
        $sql = $this->db->insert('TEMA', $data);
        return $sql;
    }

    public function UpdateTema($coincidir,$datos)
    {
        $this->db->set($datos);
        $this->db->where($coincidir);
        $query=$this->db->update('TEMA');
        return $query;
    }

    public function DeleteTema($data)
    {
        $query=$this -> db -> delete ( 'TEMA',$data);  
        return $query;
       // var_dump($query);
    }
}
