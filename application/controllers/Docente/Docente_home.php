<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Docente_home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('Admin/Admin'));
        $this->load->model(array('Admin_Cursos_model', 'Admin_model', 'Docente_Temas_model'));
        // load url helper
        $this->load->helper(array('Admin/Admin', 'Docente/docente'));
    }
    public function index()
    {
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso
            $data = array(
                'Docente' => $this->session->userdata('Id_Usuario')
            );
            $res = $this->Admin_Cursos_model->getCursosDocente($data); // recuperando cursos para armar la vista
            $this->load->view('Docente/vDocente', array('data' => $res)); //mandar el array a la vista

        } else {
            show_404();
        }
    }
    public function getTema(){
        $idTema=$this->input->post("idTema");
        $idCurso=$this->input->post("idCurso");
        $res = $this->Docente_Temas_model->getTema($idTema,$idCurso);
        echo json_encode($res);
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

    public function Temas($idCurso)
    {
        // $idCurso=0;
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso
            $this->load->view('Docente/vTablaTemas'); //, array('id' => 0)); //mandar el array a la vista
        } else {
            show_404();
        }
    }

// TODO ESTO ES PARA LA VISTA DE CREAR TEMAS
    public function CrearTema($idCurso)
    {
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso
            $this->load->view('Docente/vCrearTema'); //, array('id' => 0)); //mandar el array a la vista
        } else {
            show_404();
        }
    }
    

    public function SubirImagen()
    {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules(getThemesRules());

        if ($this->form_validation->run() === FALSE) { // si el nombre viene vacío

            $error = array(
                'Nombre_T' => form_error('Nombre_T'),
                'errorI' => ''
            );
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($error));
        } else { // si el formulario viene bien
            $nombre_T = $this->input->post('Nombre_T');
            $Curso = $this->input->post('Curso');
            $data = array(
                'Nombre_T' => $nombre_T,
                'Curso ' => $Curso
            );

            if ($this->Docente_Temas_model->ExistsTema($data)) { //existe entonces error no se puede crear Ccurso
                $this->session->set_flashdata('msge', '¡ERROR! EL TEMA YA EXISTE');
                echo json_encode(array('url' => base_url('Temas/Crear/' . $Curso)));
            } else { // no existe se puede cargar imagen y crear tema
                if ($this->Docente_Temas_model->CreateTema($data)) { //inserción exitosa
                    $json = $_FILES['image'];
                    if (strlen($json['name']) > 0) {
                        $config = [
                            "upload_path" => "./uploads/ImgTemas/",
                            "allowed_types" => "jpeg|jpg|png",
                            "min_width" => 400,
                            "min_height" => 400,
                            "file_name" => $nombre_T
                            //"max_width" => 800,
                            //"max_height" => 800
                        ];
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('image')) { // no se pudo subir la imagen
                            //  $this->session->set_flashdata('msge', $this->upload->display_errors());
                            $error = $this->upload->display_errors();
                            /*
                            $error = array(
                                'errorI' => '<ul>
                                        <li>Verifique el tipo de la imagen (jpeg, jpg, png)</li>
                                        <li>Verifique la altura mínima de la imagen debe ser 400</li>
                                        <li>Verifique el ancho mínimo de la imagen  debe ser 400</li>
                                       </ul>',
                                'Nombre_T' => ''
                            );
                            */
                            $this->Docente_Temas_model->DeleteTema($data);
                            $this->output
                                ->set_status_header(400)
                                ->set_output(json_encode($error));
                        } else {
                            // echo json_encode($this->upload->data('file_name'));
                            $datos['Imagen'] =  'uploads/ImgTemas/' . $this->upload->data('file_name');

                            if ($this->Docente_Temas_model->UpdateTema($data, $datos)) {
                                $this->session->set_flashdata('msg', 'EL TEMA FUE CREADO CON ÉXITO');
                            } else {
                                $this->Docente_Temas_model->DeleteTema($data);
                                unlink(base_url($datos['Imagen']));
                                $this->session->set_flashdata('msge', '¡ERROR! HUBO UN ERROR AL CREAR EL TEMA');
                            }
                            echo json_encode(array('url' => base_url('Temas/Crear/' . $Curso)));
                        }
                    }else{
                        $this->session->set_flashdata('msg', 'EL TEMA FUE CREADO CON ÉXITO');
                        echo json_encode(array('url' => base_url('Temas/Crear/' . $Curso)));
                    }
                    //
                } else { // inserciósn fallida
                    $this->session->set_flashdata('msge', '¡ERROR! HUBO UN ERROR AL CREAR EL TEMA');
                    echo json_encode(array('url' => base_url('Temas/Crear/' . $Curso)));
                }
            }
        }
    }
}
