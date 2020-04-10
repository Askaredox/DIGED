<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CDashboardTemas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array());
        $this->load->helper(array());
    }
    public function index()
    {
        if ($this->session->userdata('is_logged') &&($this->session->userdata('Tipo')==2) ) { // si hay alguien loggeado muestra eso
            $this->load->view('Docente/vTemasCursos');//, array('id' => $idCurso)); //mandar el array a la vista
        } else {
            show_404();
        }
    }

    public function CrearTema(){
        
    }
}