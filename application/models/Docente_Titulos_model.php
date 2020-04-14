<?php
/*todo para crear usuarios */

class Docente_Titulos_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function getTitulos($data) //segun el curso que seleccione el doceente
    {
      //  var_dump($data);
        $query = $this->db->get_where('TITULO', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

    public function ExistsTitulo($data)
    {
        $sql = $this->db->get_where('TITULO', $data);
        if ($sql->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function CreateTitulo($data)
    {
        $sql = $this->db->insert('TITULO', $data);
        return $sql;
    }

    public function UpdateTitulo($coincidir,$datos)
    {
        $this->db->set($datos);
        $this->db->where($coincidir);
        $query=$this->db->update('TITULO');
        return $query;
    }

    public function DeleteTitulo($data)
    {
        $query=$this -> db -> delete ( 'TITULO',$data);  
        return $query;
       // Id_Titulo, Nombre, Contenido, Tema, Coord_X, Coord_Y
    }
}
