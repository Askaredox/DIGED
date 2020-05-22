<?php
/*todo para crear usuarios */

class Comprobacion_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function getComprobacion($data)//IDtitulo
    {
        $query = $this->db->get_where('COMPROBACION', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return FALSE;
    }

    public function getPreguntas($data)//ID COMPROBACION
    {
        $query = $this->db->get_where('PREGUNTA', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }
    public function getRespuestaCORTA($data)//ID  pregunta
    {
        $query = $this->db->get_where('RESPUESTA_CORTA', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }
    public function getRespuestaMULTIPLE($data)//ID  pregunta
    {
        $query = $this->db->get_where('RESPUESTA_MULTIPLE', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

    public function getRespuestaSOPA($data)//ID  pregunta
    {
        $query = $this->db->get_where('RESPUESTA_SOPA', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

    public function getRespuestaVF($data)//ID  pregunta
    {
        $query = $this->db->get_where('RESPUESTA_VF', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return FALSE;
    }

    public function getRespuestaCRUCIGRAMA($data)//ID  pregunta
    {
        $query = $this->db->get_where('RESPUESTA_CRUCIGRAMA', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }
}