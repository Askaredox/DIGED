<?php

class Api_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function getCursos()
    {
        $query = $this->db->query('SELECT Cod_Curso,C.Nombre as Curso, CONCAT(u.Nombre,\' \',u.Apellido) as Docente FROM `CURSO` C 
            INNER JOIN `USUARIO` u 
            ON  C.Docente= u.Id_Usuario;');

        if ($query->num_rows() > 0) 
            return $query->result_array();
        return FALSE;
    }
    public function getTemas($datos){
        $sql="SELECT Cod_Tema, Nombre_T AS tema FROM `TEMA` WHERE curso = ?;";
        $query = $this->db->query($sql, [ $datos ]);

        if ($query->num_rows() > 0) 
            return $query->result_array();
        return FALSE;
    }
    public function getTemaImg($datos){
        $sql="SELECT Nombre_T, Imagen FROM `TEMA` WHERE Cod_Tema = ?;";
        $query = $this->db->query($sql, [ $datos ]);
        $row= $query->row();
        if(isset($row))
            return $row;
        else 
            return FALSE;
    }
    public function getTituloCords($datos){
        $sql="SELECT Id_Titulo, Nombre, Coordenadas, tipoEnlace FROM `TITULO` WHERE Tema = ?;";
        $query = $this->db->query($sql, [ $datos ]);

        if ($query->num_rows() > 0) 
            return $query->result_array();
        return FALSE;
    }
    public function getContenido($datos){
        $sql="SELECT Contenido FROM `TITULO` WHERE Id_Titulo = ?;";
        $query = $this->db->query($sql, [ $datos ]);
        $row= $query->row();
        if(isset($row))
            return $row;
        else 
            return FALSE;
    }
}