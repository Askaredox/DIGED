<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTablaCursos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Admin_Cursos_model', 'Admin_model'));
    }
    public function index()
    {
        if ($this->session->userdata('is_logged')) {

            if (!$res = $this->Admin_Cursos_model->getCursos()) { // recuperando cursos para armar la vista
                $this->session->set_flashdata('msge', '¡Aún no hay cursos registrados!');
                redirect('Administracion');
            } else {
                $this->load->view('vTablaCursos', array('data' => $res)); //mandar el array a la vista
                // var_dump(json_encode($res));
            }
        } else {
            show_404();
        }
    }

    public function Editar()
    {
        $Codigo = $_POST["Cod_Curso"];
        $data = array(
            'Docente'   => $_POST["Docente"],
            'Nombre'    => $_POST["Nombre"]
        );


        if ($this->Admin_model->CursoExist(array('Cod_Curso' => $Codigo))) {
            if ($this->Admin_model->CursoExist($data)) { //existe
                $this->output
                    ->set_status_header(400)
                    ->set_output(json_encode(array('msge' => '¡ERROR! El Curso impartido  por ese docente ya existe.')));
            } else { // no existe entonces se edita
                if ($this->Admin_Cursos_model->UpdateCurso($Codigo, $data)) { // 
                    $this->session->set_flashdata(array('msg' => 'Se actualizó con éxito el Curso ' . $data['Nombre']));
                    $this->output->set_output(json_encode(array('url' => base_url('Administrar/Cursos'))));
                } else {
                    $this->session->set_flashdata(array('msge' => '¡ERROR! no se pudo actualizar el curso ' . $data['Nombre']));
                    $this->output->set_output(json_encode(array('url' => base_url('Administrar/Cursos'))));
                }
            }
        } else {
            $this->session->set_flashdata(array('msge' => '¡ERROR! no se pudo actualizar el curso ' . $data['Nombre'] . ' impartido por el docente con el Código ' . $data['Docente'] . ' porque no existe'));
            $this->output->set_output(json_encode(array('url' => base_url('Administrar/Cursos'))));
        }
    }

    public function Eliminar()
    {
        $data = array(
            "Cod_Curso" => $this->input->post('Id_Curso')
        );

        if ($this->Admin_Cursos_model->existsCurso($data)) { // existe
            if ($this->Admin_Cursos_model->DeleteCurso($data)) { // si se elimino correctamente
                $this->session->set_flashdata('msg', 'Se eliminó con éxito el Curso');
                $this->output->set_output(json_encode(array('url' => base_url('Administrar/Cursos'))));
            } else { // si existió un error.
                $this->session->set_flashdata('msge', '¡ERROR! No se pudo eliminar el Curso');
                $this->output->set_output(json_encode(array('url' => base_url('Administrar/Cursos'))));
            }
        } else { // no existe
            $this->session->set_flashdata('msge', '¡ERROR! El Curso no Existe');
            $this->output->set_output(json_encode(array('url' => base_url('Administrar/Cursos'))));
        }
    }
}
