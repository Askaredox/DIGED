<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('Admin/Admin'));
        $this->load->model(array('Admin_model'));
    }
    public function index()
    {
        if ($this->session->userdata('is_logged')) { // si hay alguien loggeado muestra eso
            $this->load->view('vAdmin_page');
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
            $this->output->set_output(json_encode(array('url' => base_url('Administracion'))));
        }
    }
    // PARA CREAR LOS CURSOS-----------------------
    public function MostrarProfesores()
    {
        if (!$res = $this->Admin_model->getDocentes()) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('msg' => 'NO HAY PROFESORES REGISTRADOS')));
        } else {
            $this->output->set_output(json_encode($res));
        }
    }

    public function RegistrarCurso()
    {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules(getRegisterCurseRules());

        if ($this->form_validation->run() === FALSE) {
            $error = array(
                'Curso' => form_error('NombreCurso'),
                'Docente' => form_error('selectDocente'),
            );
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($error));
        } else { // insertar el curso
            $data = array(
                'Nombre' => $this->input->post('NombreCurso'),
                'Docente' => $this->input->post('selectDocente'),
            );

            //Verificamos si existe
            if ($this->Admin_model->CursoExist($data)) { //existe entonces es error
                $this->output
                    ->set_status_header(500)
                    ->set_output(json_encode(array('msge' => '¡ERROR! EL Curso impartido por ese docente ya existe.')));
            } else { // no existe entonces lo ingresamos
                if (!$this->Admin_model->CreateCurso($data)) { //no se pudo ingresar el registro
                    // $this->session->set_flashdata('msge', '¡ERROR! Al  crear Curso.');
                    $this->output
                        ->set_status_header(500)
                        ->set_output(json_encode(array('msge' => '¡ERROR! Al  crear Curso.')));
                } else {
                    $this->session->set_flashdata('msg', 'Se creó con Éxito el Curso');
                    $this->output->set_output(json_encode(array('url' => base_url('Administracion'), 'msg' => 'Se creó con Éxito el Curso')));
                }
            }
        }
    }
}
