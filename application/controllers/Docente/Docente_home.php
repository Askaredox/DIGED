<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Docente_home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('Admin/Admin'));
        $this->load->model(array('Admin_Cursos_model','Admin_model'));
        // load url helper
        $this->load->helper(array('Admin/Admin'));
    }
    public function index()
    {
        if ($this->session->userdata('is_logged') &&($this->session->userdata('Tipo')==2) ) { // si hay alguien loggeado muestra eso
            $data = array(
                'Docente' => $this->session->userdata('Id_Usuario')
            );
            $res = $this->Admin_Cursos_model->getCursosDocente($data); // recuperando cursos para armar la vista
            $this->load->view('Docente/vDocente', array('data' => $res)); //mandar el array a la vista

        } else {
            show_404();
        }
    }

    public function changePassword()
    {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules(getChangePassRules());
        if ($this->form_validation->run() === FALSE) {
            $error = array(
                'P1' => form_error('Pass1'),
                'P2' => form_error('Pass2'),
            );
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($error));
        } else { // cambiar la contra
            $data = array(
                'Contraseña' => $this->input->post('Pass1'),
            );
            $id = $this->session->userdata('Id_Usuario');
            if (!$this->Admin_model->UpdateContraseña($id, $data)) { //no se actualizó
                $this->session->set_flashdata('msge', '¡ERROR NO SE PUDO ACTUALIZAR LA CONTRASEÑA!');
            } else {
                $this->session->set_flashdata('msg', '¡SE ACTUALIZÓ CON ÉXITO LA CONTRASEÑA!');
            }
            $this->output->set_output(json_encode(array('url' => base_url('HOME'))));
        }
    }
}
