<?php

class Api_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function getCursos()
    {
        $query = $this->db->query('SELECT Cod_Curso,C.Nombre as Curso, CONCAT(u.Nombre,\' \',u.Apellido) as Docente FROM `curso` C 
            INNER JOIN `USUARIO` u 
            ON  C.Docente= u.Id_Usuario;');

        if ($query->num_rows() > 0) 
            return $query->result_array();
        return FALSE;
    }
    public function getTemas($datos){
        $sql="SELECT Cod_Tema, Nombre_T AS tema FROM `tema` T WHERE curso = ?;";
        $query = $this->db->query($sql, [ $datos ]);

        if ($query->num_rows() > 0) 
            return $query->result_array();
        return FALSE;
    }
}