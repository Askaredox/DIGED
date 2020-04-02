<?php
/*todo para crear usuarios */

class Admin_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function UpdateContraseña($id, $data)
    {
        $this->db->where('Id_Usuario',  $id);
        $sql = $this->db->update('USUARIO',  $data);
        return $sql;
    }

    public function getDocentes()
    {
        $query = $this->db->get_where('USUARIO', array('Tipo' => 2));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

    public function CursoExist($data)
    {
        $query = $this->db->get_where('CURSO', $data);

        if ($query->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function CreateCurso($data)
    {
        $sql = $this->db->insert('CURSO',  $data);
        return $sql;
    }

    public function getCursos()
    {
        $query = $this->db->get('CURSO');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }
}
