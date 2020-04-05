<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cRegistroDocentes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('Admin/Admin'));
        $this->load->model(array('Admin_Docente_model'));
    }
    public function index()
    {
        if ($this->session->userdata('is_logged')) {
            $this->load->view('Admin/vRegistroDocentes'); //mandar el array a la vista
        } else {
            show_404();
        }
    }

    public function RegistrarDocente()
    {

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules(getRegisterDocenteRules());
        if ($this->form_validation->run() === FALSE) {
            $error = array(
                'Codigo' => form_error('Codigo'),
                'Nombre' => form_error('Nombre'),
                'Apellido' => form_error('Apellido'),
                'password' => form_error('password'),
            );
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($error));
        } else {
            $cod = $this->input->post('Codigo');
            $nom = $this->input->post('Nombre');
            $ape = $this->input->post('Apellido');
            $pass = $this->input->post('password');

            $data = array(
                'Id_Usuario' => $cod,
                'Nombre' => $nom,
                'Apellido' => $ape,
                'Contraseña' => $pass
            );
            if ($this->Admin_Docente_model->existsDocente($data)) { // si existe entonces error
                $this->session->set_flashdata('msge', '¡ERROR! El Docente ya se encuentra registrado');
                $this->output->set_output(json_encode(array('url' => base_url('Registrar/Docentes'))));
            } else { // no existe insertar
                $data['Tipo'] = 2;
                if ($this->Admin_Docente_model->createDocente($data)) { //si se insertó 
                    $this->output->set_output(json_encode(array('url' => base_url('Registrar/Docentes'))));
                    $this->session->set_flashdata('msg', 'El Docente fue registrado Correctamente');
                } else { // no se pudo insertar
                    $this->output->set_output(json_encode(array('url' => base_url('Registrar/Docentes'))));
                    $this->session->set_flashdata('msge', '¡ERROR! Ocurrió un error al registrar el docente');
                }
            }
        }
    }
}
