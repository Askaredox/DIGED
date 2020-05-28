<?php
/*todo para crear usuarios */

class Comprobacion_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function getComprobacion($data) //IDtitulo
    {
        $query = $this->db->get_where('COMPROBACION', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return FALSE;
    }

    public function getPreguntas($data) //ID COMPROBACION
    {
        $query = $this->db->get_where('PREGUNTA', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }
    public function getRespuestaCORTA($data) //ID  pregunta
    {
        $query = $this->db->get_where('RESPUESTA_CORTA', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }
    public function getRespuestaMULTIPLE($data) //ID  pregunta
    {
        $query = $this->db->get_where('RESPUESTA_MULTIPLE', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

    public function getRespuestaSOPA($data) //ID  pregunta
    {
        $query = $this->db->get_where('PALABRA', $data);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return FALSE;
    }

    public function getRespuestaVF($data) //ID  pregunta
    {
        $query = $this->db->get_where('RESPUESTA_VF', $data);
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return FALSE;
    }

    //----------------------------------------------------------------------
    public function existsTest($data) // id titulo
    {
        $query = $this->db->get_where('COMPROBACION', $data);
        if ($query->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }
    public function createTest($data)
    {
        $sql = $this->db->insert('COMPROBACION', $data);
        return $sql;
    }


    public function deleteTest($data) // id del test y id del titulo
    {
        $query = $this->db->delete('COMPROBACION', $data);
        return $query;
    }

    //------------------------------------------------------------------------
    public function createQuestion($data)
    {
        $sql = $this->db->insert('PREGUNTA', $data);
        return $sql;
    }

    public function deleteQuestion($data)
    {
        $sql = $this->db->delete('PREGUNTA', $data);
        return $sql;
    }

    //--------------------------------------------------------------------------------------
     //******************************************* */
    public function createAnswerVF($data)
    {
        $sql = $this->db->insert('RESPUESTA_VF', $data);
        return $sql;
    }
    public function deleteAnswerVF($data)
    {
        $sql = $this->db->delete('RESPUESTA_VF', $data);
        return $sql;
    }


     //******************************************* */
    public function createAnswerShort($data)
    {
        $sql = $this->db->insert('RESPUESTA_CORTA', $data);
        return $sql;
    }
    public function deleteAnswerShort($data)
    {
        $sql = $this->db->delete('RESPUESTA_CORTA', $data);
        return $sql;
    }
    
    //******************************************* */
    public function createAnswerMul($data)
    {
        $sql = $this->db->insert('RESPUESTA_MULTIPLE', $data);
        return $sql;
    }
    public function deleteAnswerMul($data)
    {
        $sql = $this->db->delete('RESPUESTA_MULTIPLE', $data);
        return $sql;
    }
}
