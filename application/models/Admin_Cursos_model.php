<?php
/*todo para crear usuarios */

class Admin_Cursos_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function getCursos()
    {
        $query = $this->db->query('SELECT Cod_Curso,C.Nombre as Curso, CONCAT(u.Nombre,\' \',u.Apellido) as Docente, Id_Usuario FROM `CURSO` C '
            . ' INNER JOIN `USUARIO` u '
            . ' ON  C.Docente= u.Id_Usuario');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

    public function UpdateCurso($id, $datos)
    {
        $this->db->set($datos);
        $this->db->where('Cod_Curso',$id);
        $query=$this->db->update('CURSO');
        return $query;
    }

    public function  existsCurso($data){
        $sql = $this->db->get_where('CURSO', $data);
        if ($sql->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function DeleteCurso($data){
        $query=$this -> db -> delete ( 'CURSO',$data);  
        return $query;
       // var_dump($query);
    }

    public function getCursosDocente($data){
        $query = $this->db->get_where('CURSO', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return $query->result_array();
    }
}
