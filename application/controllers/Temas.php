<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Temas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Docente_Temas_model','Docente_Titulos_model'));
        $this->load->helper(array());
    }
    public function index()
    {
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso
            $this->load->view('Docente/vTablaTemas'); //, array('id' => $idCurso)); //mandar el array a la vista
        } else {
            show_404();
        }
    }

    public function Administrar($idCurso = 0)
    {
        $curso=$this->Docente_Temas_model->getCurso($idCurso);
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso
            if (!$res = $this->Docente_Temas_model->getTemas(array('Curso' => $idCurso))) { // recuperando cursos para armar la vista
                //$this->session->set_flashdata('msge', '¡Este Curso no tiene Temas Creados aún!'); //tiene bug que se pasa al home cuando no se cierra
                $this->load->view('Docente/vTablaTemas', array('data' => null, 'curso' => $curso));
            } else {
                $this->load->view('Docente/vTablaTemas', array('data' => $res, 'curso' => $curso)); //mandar el array a la vista
            }
        } else {
            show_404();
        }
    }
    public function EditTema($idCurso, $idTema){
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso
            $this->load->view('Docente/vEditTema'); //, array('id' => 0)); //mandar el array a la vista
        } else {
            show_404();
        }
    }
    
    public function UpdateImage()
    {
        $nombre_T = $this->input->post('Nombre_T');
        $Cod_Tema = $this->input->post('Tema');
        $Curso = $this->input->post('Curso');

        $coincidir = array(
            'Curso' => $Curso,
            'Cod_Tema' => $Cod_Tema
        );
        //var_dump($coincidir);


        if ($this->Docente_Temas_model->ExistsTema($coincidir)) { //existe entonces se puede actualizar imagen
            $json = $_FILES['image'];
            if (strlen($json['name']) > 0) {
                $config = [
                    "upload_path" => "./uploads/ImgTemas/",
                    "allowed_types" => "jpeg|jpg|png|gif",
                    "min_width" => 400,
                    "min_height" => 400,
                    "file_name" => $Curso."_".$nombre_T
                    //"max_width" => 800,
                    //"max_height" => 800
                ];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) { // no se pudo subir la imagen
                    //  $this->session->set_flashdata('msge', $this->upload->display_errors());
                    //$error = $this->upload->display_errors();
                    $error = array(
                        'errorI' => '<ul>
                                        <li>Verifique el tipo de la imagen (jpeg, jpg)</li>
                                        <li>Verifique la altura mínima de la imagen debe ser 400</li>
                                        <li>Verifique el ancho mínimo de la imagen  debe ser 400</li>
                                       </ul>',
                    );
                    $this->output
                        ->set_status_header(400)
                        ->set_output(json_encode($error));
                } else {
                    // echo json_encode($this->upload->data('file_name'));

                    if (!$res = $this->Docente_Temas_model->getTemas($coincidir)) { //error al obtener la imagen
                        $this->session->set_flashdata('msge', '¡ERROR! NO SE PUEDE ACTUALIZAR EL TEMA');
                        echo json_encode(array('url' => base_url('Temas/Administrar/' . $Curso), 'msg' => "", 'ruta' => ''));
                    } else {
                        foreach ($res as $row) {
                            $imagenEliminar = $row['Imagen'];
                        }
                        $datos['Imagen'] =  'uploads/ImgTemas/' . $this->upload->data('file_name'); // nueva imagen cargada
                        $datos['Nombre_T'] =  $nombre_T; // nueva imagen cargada
                        if ($this->Docente_Temas_model->UpdateTema($coincidir, $datos)) {
                            if (strlen($imagenEliminar) > 0) {
                                unlink('./' . $imagenEliminar);
                            }

                            echo json_encode(array('url' => '', 'msg' => 'La Imagen fue cargada con éxito', 'ruta' => $datos['Imagen']));
                        } else { //no se pudo actualizar  a nivel de tabla
                            unlink('./' . $datos['Imagen']);
                            $error = array(
                                'errorI' => 'No se pudo actualizar la imagen',
                            );

                            $this->output
                                ->set_status_header(400)
                                ->set_output(json_encode($error));
                        }
                    }
                }
            } else {
                $error = array(
                    'errorI' => 'No seleccionó una Imagen',
                );

                $this->output
                    ->set_status_header(400)
                    ->set_output(json_encode($error));
            }
        } else { //no existe debe dar error    
            $this->session->set_flashdata('msge', '¡ERROR! EL TEMA NO EXISTE');
            echo json_encode(array('url' => base_url('Temas/Administrar/' . $Curso), 'msg' => $coincidir, 'ruta' => ''));
        }
    }

    public function DeleteImage()
    {
        $nombre_T = $this->input->post('Nombre_T');
        $Cod_Tema = $this->input->post('TEMPTema');
        $Curso = $this->input->post('TEMPcurso');

        $coincidir = array(
            'Nombre_T' => $nombre_T,
            'Curso ' => $Curso,
            'Cod_Tema' => $Cod_Tema
        );
        // var_dump($coincidir);



        if ($this->Docente_Temas_model->ExistsTema($coincidir)) { //existe entonces se puede actualizar imagen
            // echo json_encode($this->upload->data('file_name'));

            if (!$res = $this->Docente_Temas_model->getTemas($coincidir)) { //error al obtener la imagen
                $this->session->set_flashdata('msge', '¡ERROR! NO SE PUEDE ACTUALIZAR EL TEMA');
                echo json_encode(array('url' => base_url('Temas/Administrar/' . $Curso), 'msg' => ""));
            } else {
                foreach ($res as $row) {
                    $imagenEliminar = $row['Imagen'];
                }
                $datos['Imagen'] =  NULL; // nueva imagen cargada
                if ($this->Docente_Temas_model->UpdateTema($coincidir, $datos)) {
                    if (strlen($imagenEliminar) > 0) {
                        unlink('./' . $imagenEliminar);
                    }


                    $this->Docente_Titulos_model->UpdateTitulo(array('Tema'=> $Cod_Tema), array('Coordenadas'=>NULL, 'tipoEnlace'=>NULL));
                    echo json_encode(array('url' => '', 'msg' => 'La Imagen fue eliminada con éxito'));
                } else { //no se pudo actualizar  a nivel de tabla
                    $error = array(
                        'errorI' => 'No se pudo eliminar la imagen',
                    );

                    $this->output
                        ->set_status_header(400)
                        ->set_output(json_encode($error));
                }
            }
        } else { //no existe debe dar error    
            $this->session->set_flashdata('msge', '¡ERROR! EL TEMA NO EXISTE');
            echo json_encode(array('url' => base_url('Temas/Administrar/' . $Curso), 'msg' => ''));
        }
    }

    public function UpdateTema()
    {
        $coincidir = array(
            'Cod_Tema' => $this->input->post('Tema'),
            'Curso' => $this->input->post('Curso')
        );

        $datos = array(
            'Nombre_T' => $this->input->post('Nombre_T')
        );

        if ($this->Docente_Temas_model->ExistsTema($coincidir)) { //existe 

            $comp['Cod_Tema'] = $coincidir['Cod_Tema'];
            $comp['Curso'] = $coincidir['Curso'];
            $comp['Nombre_T'] = $datos['Nombre_T'];

            if ($this->Docente_Temas_model->ExistsTema($comp)) { // ya existe debería dar error
                $this->session->set_flashdata('msge', '¡ERROR! EL NOMBRE DE TEMA QUE TRATA DE ASIGNAR YA ESTÁ EN USO');
                echo json_encode(array('url' => base_url('Temas/Administrar/' . $coincidir['Curso'])));
            } else { /// no existe se procede a actualizar

                if ($this->Docente_Temas_model->UpdateTema($coincidir, $datos)) { //se pudo actualizar
                    $this->session->set_flashdata('msg', '¡EL TEMA SE ACTUALIZÓ CON ÉXITO!');
                    echo json_encode(array('url' => base_url('Temas/Administrar/' . $coincidir['Curso'])));
                } else {
                    $this->session->set_flashdata('msge', '¡ERROR! EL TEMA NO SE PUDO ACTUALIZAR');
                    echo json_encode(array('url' => base_url('Temas/Administrar/' . $coincidir['Curso'])));
                }
            }
        } else { // no existe mandar error
            $this->session->set_flashdata('msge', '¡ERROR! EL TEMA NO EXISTE');
            echo json_encode(array('url' => base_url('Temas/Administrar/' . $coincidir['Curso']), 'msg'=>$coincidir));
        }
    }

    public function DeleteTema()
    {
        $Curso = $this->input->post('Curso');
        $datos = array(
            'Cod_Tema' => $this->input->post('Cod_Tema'),
            'Curso' => $Curso
        );

        if (!$res = $this->Docente_Temas_model->getTemas($datos)) { //error al obtener la imagen
            $this->session->set_flashdata('msge', '¡ERROR! EL TEMA NO EXISTE');
            echo json_encode(array('url' => base_url('Temas/Administrar/' . $Curso), 'msg' => ''));
        } else {
            foreach ($res as $row) {
                $imagenEliminar = $row['Imagen'];
            }
        }
        if ($this->Docente_Temas_model->ExistsTema($datos)) { // si existe se puede borrar
            if ($this->Docente_Temas_model->DeleteTema($datos)) { // se eliminó
                if (strlen($imagenEliminar) > 0) {
                    unlink('./' . $imagenEliminar);
                }
                $this->session->set_flashdata('msg', 'EL TEMA SE ELIMINÓ EXITOSAMENTE');
                echo json_encode(array('url' => base_url('Temas/Administrar/' . $Curso), 'msg' => ''));
            } else { // no se pudo eliminar
                $this->session->set_flashdata('msge', '¡ERROR! OCURRIÓ UNA FALLA AL ELIMINAR EL TEMA');
                echo json_encode(array('url' => base_url('Temas/Administrar/' . $Curso), 'msg' => ''));
            }
        } else { // no existe debe dar error
            $this->session->set_flashdata('msge', '¡ERROR! EL TEMA NO EXISTE');
            echo json_encode(array('url' => base_url('Temas/Administrar/' . $Curso), 'msg' => ''));
        }
    }
}
