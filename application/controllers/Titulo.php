<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Titulo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Docente_Titulos_model', 'Docente_Temas_model'));
        $this->load->helper(array('Docente/docente'));
    }
    public function index()
    {
    }
    public function Dashboard($idCurso, $idTema)
    {
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso
            $this->load->view('Docente/vTitulosDashboard'); //, array('id' => $idCurso)); //mandar el array a la vista
        } else {
            show_404();
        }
    }

    public function Crear($idCurso, $idTema)
    {
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso

            if (!$res = $this->Docente_Temas_model->getTemas(array('Cod_Tema' => $idTema, 'Curso' => $idCurso))) // esto es para obtener la imagen
            {
                $this->session->set_flashdata('msge', 'Ha Ocurrido un error, intentelo de nuevo 1');
                redirect(base_url('Titulo/Dashboard/' . $idCurso . '/' . $idTema));
            } else { // 
                foreach ($res as $row) {
                    $imagen = $row['Imagen'];
                }
                if (strlen($imagen) > 0) { // si existe una imagen
                    if (!$data = $this->Docente_Titulos_model->getTitulos(array('Tema' => $idTema))) { // buscar los titulos
                        // $this->session->set_flashdata('msge', 'Ha Ocurrido un error, intentelo de nuevo 2');
                        //redirect(base_url('Titulo/Dashboard/' . $idCurso . '/' . $idTema));
                        $this->load->view('Docente/vCrearTitulo', array('img' => $imagen)); //, array('id' => $idCurso)); //mandar el array a la vista
                    } else { // si si encuentra verificar
                        $titulos = array();
                        foreach ($data as $row) {
                            $X = $row['Coordenadas'];

                            if (strlen($X) > 0) { // si tienen coordenadas meter en el arreglo
                                $tmp = array(
                                    'Nombre' => $row['Nombre'],
                                    'Coordenadas' => $row['Coordenadas'],
                                    'tipoEnlace' => $row['tipoEnlace']
                                );
                                $titulos[] = $tmp;
                            }
                        }
                        $this->load->view('Docente/vCrearTitulo', array('img' => $imagen, 'data' => $titulos));
                    }
                } else { // si no existe solo carga la vista
                    $this->load->view('Docente/vCrearTitulo'); //, array('id' => $idCurso)); //mandar el array a la vista
                }
            }
        } else {
            show_404();
        }
    }

    public function Administrar($idCurso, $idTema)
    {

        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso

            $data = $this->Docente_Titulos_model->getTitulos(array('Tema' => $idTema));
            //var_dump($data);
            if (!$data) { //entpnces no hay titulos registrados aún
                $this->session->set_flashdata('msge', 'ESTE TEMA AÚN NO TIENE TITULOS REGISTRADOS');
                redirect(base_url('Titulo/Dashboard/' . $idCurso . '/' . $idTema));
            } else {

                if (!$res = $this->Docente_Temas_model->getTemas(array('Cod_Tema' => $idTema, 'Curso' => $idCurso))) // esto es para obtener la imagen
                {
                    $this->session->set_flashdata('msge', 'Ha Ocurrido un error, intentelo de nuevo 1');
                    $this->load->view('Docente/vTablaTitulos', array('data' => $data));
                } else { // 
                    foreach ($res as $row) {
                        $imagen = $row['Imagen'];
                    }
                    if (strlen($imagen) > 0) { // si existe una imagen
                        $this->load->view('Docente/vTablaTitulos', array('data' => $data, 'img' => $imagen)); //, array('id' => $idCurso)); //mandar el array a la vista
                    } else {
                        $this->load->view('Docente/vTablaTitulos', array('data' => $data)); //, array('id' => $idCurso)); //mandar el array a la vista
                    }
                }
            }
        } else {
            show_404();
        }
    }
    public function CrearTitulo()
    {
        //getTitlesRules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules(getTitlesRules());

        if ($this->form_validation->run() === FALSE) {
            $error = array(
                'Nombre' => form_error('Nombre')
            );

            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($error));
        } else { // si el formulario viene bien
            $Curso = $this->input->post('Curso');
            $Coordenadas = $this->input->post('Coordenadas');
            $tipoEnlace = $this->input->post('tipoEnlace');
            $Tema =  $this->input->post('Tema');
            if (strlen($Coordenadas) > 0 && strlen($tipoEnlace) > 0) {
                $datos = array(
                    'Nombre' => $this->input->post('Nombre'),
                    'Tema' => $this->input->post('Tema'),
                    'Coordenadas' => $Coordenadas,
                    'tipoEnlace' => $tipoEnlace
                );
            } else {
                $datos = array(
                    'Nombre' => $this->input->post('Nombre'),
                    'Tema' => $Tema,
                );
            }
            if ($this->Docente_Titulos_model->ExistsTitulo(array('Nombre' => $datos['Nombre'], 'Tema' => $datos['Tema']))) { // si existe tiraria error
                $this->output
                    ->set_status_header(401)
                    ->set_output(json_encode(array('error' => '¡ERROR! EL TITULO YA EXISTE.')));
            } else { // no existe entonces se almacena
                if ($this->Docente_Titulos_model->CreateTitulo($datos)) { //Si se puedo insertar
                    $this->session->set_flashdata('msg', 'SE CREÓ CON ÉXITO EL TITULO');
                    echo json_encode(array('url' => base_url('Titulo/Crear/' . $Curso . '/' . $Tema)));
                } else { // ocurrió un error 
                    $this->output
                        ->set_status_header(401)
                        ->set_output(json_encode(array('error' => '¡ERROR! OCURRIÓ UN ERROR AL CREAR EL TITULO.')));
                }
            }
        }
    }

    public function EditarTitulo()
    {
        $Id_Titulo = $this->input->post('Id_Titulo');
        $Tema = $this->input->post('Tema');
        $Curso = $this->input->post('Curso');

        $coincidir = array(
            'Id_Titulo' => $Id_Titulo,
            'Tema' => $Tema,
        );
        $datos = array();

        $Nombre = $this->input->post('Nombre');
        $Coordenadas = $this->input->post('Coordenadas');
        $tipoEnlace = $this->input->post('tipoEnlace');

        if (strlen($Nombre) > 0) { // agregar nombre nuevo
            $datos['Nombre'] = $Nombre;
        }

        if (strlen($Coordenadas) > 0) { // agregar posición nueva
            $datos['Coordenadas'] = $Coordenadas;
            $datos['tipoEnlace'] = $tipoEnlace;
        }
        //var_dump($datos);

        if (strlen($Nombre) > 0 || strlen($Coordenadas) > 0) { // solamente si se editaron estas dos cosas se actualizará si no no se editó nada

            if ($this->Docente_Titulos_model->ExistsTitulo($coincidir)) { // si existe vamos a editarlo

                if (!$this->Docente_Titulos_model->ExistsTitulo(array('Nombre' => $Nombre, 'Tema' => $Tema))) { //verificar si ya existe un registro con el nuevo nombre
                    if ($this->Docente_Titulos_model->UpdateTitulo($coincidir, $datos)) { //se actualizó correctamente
                        $this->session->set_flashdata('msg', 'EL TITULO SE ACTUALIZÓ CORRECTAMENTE');
                        //var_dump("esto");
                        echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
                    } else { // no se actualizó correctamente
                        $this->session->set_flashdata('msge', '¡ERROR! OCURRIÓ UN ERRO AL ACTUALIZAR EL TITULO INTENTE MÁS ADELANTE');
                        echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
                    }
                } else { // si existe entonces manda un error
                    $this->output
                        ->set_status_header(400)
                        ->set_output(json_encode(array('error' => '¡ERROR! EL TITULO YA EXISTE NO SE PUEDE ACTUALIZAR EL NOMBRE.')));
                }
            } else { // de lo contrarioi no existe y debe reportarse el error

                $this->session->set_flashdata('msge', '¡ERROR! EL TITULO NO EXISTE NO SE PUEDE EDITAR');
                echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
            }
        } else { // no se edito nada así que hay que redireccionar
            //var_dump("llegó");
            $this->session->set_flashdata('msg', 'NO SE ACTUALIZO EL REGISTRO');
            echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
        }
    }

    public function BorrarTitulo()
    {
        $Id_Titulo = $this->input->post('Id_Titulo');
        $Tema = $this->input->post('Tema');
        $Curso = $this->input->post('Curso');
        $Nombre = $this->input->post('Nombre');

        if ($this->Docente_Titulos_model->ExistsTitulo(array('Id_Titulo' => $Id_Titulo))) { //ver si existe el titulo
            if ($this->Docente_Titulos_model->DeleteTitulo(array('Id_Titulo' => $Id_Titulo))) { // si se elimina bien

                $this->session->set_flashdata('msg', 'EL TITULO SE ELIMINÓ CORRECTAMENTE');
                echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
            } else { // si no se pudo eliminar
                $this->session->set_flashdata('msge', '¡ERROR! OCURRIÓ UN ERROR MIENTRAS SE ELIMINABA EL TITULO, INTENTELO DE NUEVO O ACTUALICE LA PÁGINA');
                echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
            }
        } else { // no existe  hay que mostrar error
            $this->session->set_flashdata('msge', '¡ERROR! EL TITULO NO EXISTE Y NO SE PUDO ELIMINAR');
            echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
        }
    }
}
