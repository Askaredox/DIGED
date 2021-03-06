<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTablaDocentes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Admin_Docente_model','Admin_Cursos_model','Docente_Temas_model'));
    }
    public function index()
    {
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 1)) {

            if (!$res = $this->Admin_Docente_model->getDocentes()) { // recuperando Docentes para armar la vista
                $this->session->set_flashdata('msge', '¡Aún no hay Docentes registrados!');
                redirect('Administracion');
            } else {
                $this->load->view('Admin/vTablaDocentes', array('data' => $res)); //mandar el array a la vista
            }
        } else {
            redirect('');
        }
    }

    public function EditD()
    {
        $id = $this->input->post('Id_Usuario');
        $data = array(
            'Nombre' => $this->input->post('Nombre'),
            'Apellido' => $this->input->post('Apellido'),
            'Contraseña' => $this->input->post('Contraseña'),
        );

        if ($this->Admin_Docente_model->existsDocente(array('Id_Usuario' => $id))) { // si existe
            if ($this->Admin_Docente_model->UpdateDocente($id, $data)) { // si se pudo modificar
                $this->session->set_flashdata(array('msg' => 'Se actualizó con éxito el Docente ' . $data['Nombre']));
                $this->output->set_output(json_encode(array('url' => base_url('Administrar/Docentes'))));
            } else { // no se pudo y se mandará error
                $this->session->set_flashdata(array('msge' => 'Surgió un error al actualizar los datos del Docente' . $data['Nombre']));
                $this->output->set_output(json_encode(array('url' => base_url('Administrar/Docentes'))));
            }
        } else { // no existe lanza error                
            $this->session->set_flashdata(array('msge' => 'El Docente' . $data['Nombre'] . ' Con Código ' . $id . 'No está registrado'));
            $this->output->set_output(json_encode(array('url' => base_url('Administrar/Docentes'))));
        }
    }

    public function DeleteD()
    {
        $data = array(
            "Id_Usuario" => $this->input->post('Id_Usuario')
        );

        if ($this->Admin_Docente_model->existsDocente($data)) { // existe
            //para borrar las imagenes de los cursos que impartia ese docente
            $d = array(
                'Docente' =>$data['Id_Usuario']
            );
            $res = $this->Admin_Cursos_model->getCursosDocente($d);

            foreach($res as $row){//obtener temas de cada curso $this->Docente_Temas_model->getTemas(array('Curso' => $idCurso))
                $d2 = array(
                    'Curso' =>$row['Cod_Curso']
                );

                $res2 =$this->Docente_Temas_model->getTemas($d2);
                foreach($res2 as $row2){
                    $imagenEliminar = $row2['Imagen'];

                    if (strlen($imagenEliminar) > 0) {
                        unlink('./' . $imagenEliminar);
                    }
                }
            }



            //--------------------------------------------------------------
            if ($this->Admin_Docente_model->DeleteDocente($data)) { // si se elimino correctamente
                $this->session->set_flashdata('msg', 'Se eliminó con éxito el Docente');
                $this->output->set_output(json_encode(array('url' => base_url('Administrar/Docentes'))));
            } else { // si existió un error.
                $this->session->set_flashdata('msge', '¡ERROR! No se pudo eliminar el Docente');
                $this->output->set_output(json_encode(array('url' => base_url('Administrar/Docentes'))));
            }
        } else { // no existe
            $this->session->set_flashdata('msge', '¡ERROR! El Docente con el código ' . $data['Id_Usuario'] . ' no está registrado');
            $this->output->set_output(json_encode(array('url' => base_url('Administrar/Docentes'))));
        }
    }
}
