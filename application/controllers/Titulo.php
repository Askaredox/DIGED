<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Titulo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Docente_Titulos_model', 'Docente_Temas_model', 'Comprobacion_model'));
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
            redirect('');
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
                    $wOrigin = $row['Ancho_img'];
                    $hOrigin = $row['Altura_img'];
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
                        $this->load->view('Docente/vCrearTitulo', array('img' => $imagen, 'ancho' => $wOrigin, 'alto' => $hOrigin, 'data' => $titulos));
                    }
                } else { // si no existe solo carga la vista
                    $this->load->view('Docente/vCrearTitulo'); //, array('id' => $idCurso)); //mandar el array a la vista
                }
            }
        } else {
            redirect('');
        }
    }

    public function Administrar($idCurso, $idTema)
    {
        $tema = $this->Docente_Temas_model->getTema($idTema, $idCurso);


        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso

            $data = $this->Docente_Titulos_model->getTitulos(array('Tema' => $idTema));

            // var_dump($data);
            if (!$data) { //entpnces no hay titulos registrados aún
                $this->session->set_flashdata('msge', 'ESTE TEMA AÚN NO TIENE TITULOS REGISTRADOS');

                $this->load->view('Docente/vTablaTitulos', array('data' => null, 'tema' => $tema->Nombre_T));
                //redirect(base_url('Titulo/Dashboard/' . $idCurso . '/' . $idTema));
            } else {

                if (!$res = $this->Docente_Temas_model->getTemas(array('Cod_Tema' => $idTema, 'Curso' => $idCurso))) // esto es para obtener la imagen
                {
                    $this->session->set_flashdata('msge', 'Ha Ocurrido un error, intentelo de nuevo 1');
                    $this->load->view('Docente/vTablaTitulos', array('data' => $data, 'tema' => $tema->Nombre_T));
                } else { // 
                    foreach ($res as $row) {
                        $imagen = $row['Imagen'];
                        $wOrigin = $row['Ancho_img'];
                        $hOrigin = $row['Altura_img'];
                    }
                    if (strlen($imagen) > 0) { // si existe una imagen
                        $this->load->view('Docente/vTablaTitulos', array('data' => $data, 'img' => $imagen, 'ancho' => $wOrigin, 'altura' => $hOrigin, 'tema' => $tema->Nombre_T)); //, array('id' => $idCurso)); //mandar el array a la vista
                    } else {
                        $this->load->view('Docente/vTablaTitulos', array('data' => $data, 'tema' => $tema->Nombre_T)); //, array('id' => $idCurso)); //mandar el array a la vista
                    }
                }
            }
        } else {
            redirect('');
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
            $Contenido = $this->input->post('Contenido');
            $Coordenadas = $this->input->post('Coordenadas');
            $tipoEnlace = $this->input->post('tipoEnlace');
            $Tema =  $this->input->post('Tema');
            if (strlen($Coordenadas) > 0 && strlen($tipoEnlace) > 0) {
                $datos = array(
                    'Nombre' => $this->input->post('Nombre'),
                    'Tema' => $this->input->post('Tema'),
                    'Contenido' => $Contenido,
                    'Coordenadas' => $Coordenadas,
                    'tipoEnlace' => $tipoEnlace
                );
            } else {
                $datos = array(
                    'Nombre' => $this->input->post('Nombre'),
                    'Contenido' => $Contenido,
                    'Tema' => $Tema,
                );
            }
            if ($this->Docente_Titulos_model->ExistsTitulo(array('Nombre' => $datos['Nombre'], 'Tema' => $datos['Tema']))) { // si existe tiraria error

                $this->output
                    ->set_status_header(401)
                    ->set_output(json_encode(array('error' => '¡ERROR! EL TITULO YA EXISTE.')));
            } else { // no existe entonces se almacena
                if ($insertado=$this->Docente_Titulos_model->CreateTitulo($datos)) { //Si se puedo insertar
                    $this->Comprobacion_model->createTest(array("Titulo" => $insertado, "Descripcion" => "")); //para crear una comprobacion al crearse un titulo
                    $this->session->set_flashdata('msg', 'SE CREÓ CON ÉXITO EL TITULO');
                    echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema), 'id'=>$insertado));
                } else { // ocurrió un error 
                    $this->output
                        ->set_status_header(401)
                        ->set_output(json_encode(array('error' => '¡ERROR! OCURRIÓ UN ERROR AL CREAR EL TITULO.')));
                }
            }
        }
    }
    public function Editar($idCurso, $idTema, $idTitulo)
    {
        $find = array(
            'Id_Titulo' => $idTitulo
        );
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso

            if (!$title = $this->Docente_Titulos_model->getTitulos($find)) { // no encontró el titulo hay que direccionar
                $this->session->set_flashdata('msge', '¡ERROR!Ha Ocurrido un error, intentelo de nuevo, no se encuentra el titulo a editar');
                redirect(base_url('Titulo/Administrar/' . $idCurso . '/' . $idTema));
            } else { // si se encuentra el titulo entonces enviar los datos del titulo
                foreach ($title as $roww) {
                    $Nombre_Actual = $roww['Nombre'];
                    $position = $roww['Coordenadas'];
                    $type = $roww['tipoEnlace'];
                    // $contenido = str_replace("\"", '\"', $roww['Contenido']); 
                    $contenido = $roww['Contenido'];
                }

                if (!$res = $this->Docente_Temas_model->getTemas(array('Cod_Tema' => $idTema, 'Curso' => $idCurso))) // esto es para obtener la imagen
                {
                    $this->session->set_flashdata('msge', 'Ha Ocurrido un error, intentelo de nuevo ');
                    redirect(base_url('Temas/Administrar/' . $idCurso));
                } else { //
                    foreach ($res as $row) {
                        $imagen = $row['Imagen'];
                        $wOrigin = $row['Ancho_img'];
                        $hOrigin = $row['Altura_img'];
                    }
                    if (strlen($imagen) > 0) { // si existe una imagen
                        if (!$data = $this->Docente_Titulos_model->getTitulos(array('Tema' => $idTema))) { // buscar los titulos
                            // $this->session->set_flashdata('msge', 'Ha Ocurrido un error, intentelo de nuevo 2');
                            //redirect(base_url('Titulo/Dashboard/' . $idCurso . '/' . $idTema));
                            $this->load->view('Docente/vEditTitulo', array('img' => $imagen, 'Nombre_Actual' => $Nombre_Actual, 'position' => $position, 'type' => $type, 'contenido' => $contenido)); //, array('id' => $idCurso)); //mandar el array a la vista
                        } else { // si si encuentra titulos enviarlos
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


                            //echo "La cadena resultante es: " . $resultado;
                            // var_dump($resultado);
                            $this->load->view('Docente/vEditTitulo', array('img' => $imagen, 'ancho' => $wOrigin, 'alto' => $hOrigin, 'data' => $titulos, 'Nombre_Actual' => $Nombre_Actual, 'position' => $position, 'type' => $type, 'contenido' => $contenido));
                        }
                    } else { // si no existe solo carga la vista
                        $this->load->view('Docente/vEditTitulo', array('Nombre_Actual' => $Nombre_Actual, 'contenido' => $contenido)); //mandar el array a la vista
                    }
                }
            }
        } else {
            redirect('');
        }


        /* if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) { // si hay alguien loggeado muestra eso
            $this->load->view('Docente/vEditTitulo'); //, array('id' => 0)); //mandar el array a la vista
        } else {
            redirect('');
        }*/
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
        $Contenido = $this->input->post('Contenido');

        if (strlen($Nombre) > 0) { // agregar nombre nuevo
            $datos['Nombre'] = $Nombre;
            $datos['Contenido'] = $Contenido;
        }

        if (strlen($Coordenadas) > 0) { // agregar posición nueva
            $datos['Coordenadas'] = $Coordenadas;
            $datos['tipoEnlace'] = $tipoEnlace;
        }
        //var_dump($datos);
        if ($this->Docente_Titulos_model->ExistsTitulo($coincidir)) { // si existe vamos a editarlo

            $r = $this->Docente_Titulos_model->getTitulos($coincidir);
            foreach ($r as $row) {
                $nameActual = $row['Nombre'];
            }
            //comparar si esta editando el nombre 

            // var_dump($nameActual."-".$Nombre);
            if ($nameActual == $Nombre) { //
                if ($this->Docente_Titulos_model->UpdateTitulo($coincidir, $datos)) { //se actualizó correctamente
                    $this->session->set_flashdata('msg', 'EL TITULO SE ACTUALIZÓ CORRECTAMENTE');
                    //var_dump("esto");
                    echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
                } else { // no se actualizó correctamente
                    $this->session->set_flashdata('msge', '¡ERROR! OCURRIÓ UN ERROR AL ACTUALIZAR EL TITULO INTENTE MÁS ADELANTE');
                    echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
                }
            } else {
                if ($this->Docente_Titulos_model->ExistsTitulo(array('Nombre' => $Nombre, 'Tema' => $Tema))) { //verificar si ya existe un registro con el nuevo nombre
                    // si existe entonces manda un error
                    $this->output
                        ->set_status_header(401)
                        ->set_output(json_encode(array('error' => '¡ERROR! EL TITULO YA EXISTE NO SE PUEDE ACTUALIZAR EL NOMBRE.')));
                } else {
                    if ($this->Docente_Titulos_model->UpdateTitulo($coincidir, $datos)) { //se actualizó correctamente
                        $this->session->set_flashdata('msg', 'EL TITULO SE ACTUALIZÓ CORRECTAMENTE');
                        //var_dump("esto");
                        echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
                    } else { // no se actualizó correctamente
                        $this->session->set_flashdata('msge', '¡ERROR! OCURRIÓ UN ERROR AL ACTUALIZAR EL TITULO INTENTE MÁS ADELANTE');
                        echo json_encode(array('url' => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
                    }
                }
            }
        } else { // de lo contrarioi no existe y debe reportarse el error

            $this->session->set_flashdata('msge', '¡ERROR! EL TITULO NO EXISTE NO SE PUEDE EDITAR');
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
