<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Titulo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Docente_Titulos_model', 'Docente_Temas_model'));
        $this->load->helper(array());
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
                        $this->load->view('Docente/vCrearTitulo',array('img'=> $imagen)); //, array('id' => $idCurso)); //mandar el array a la vista
                    } else { // si si encuentra verificar
                        $titulos = array();
                        foreach ($data as $row) {
                            $X = $row['Coordenadas'];

                            if (strlen($X)> 0) { // si tienen coordenadas meter en el arreglo
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
                $this->load->view('Docente/vTablaTitulos', array('data' => $data)); //, array('id' => $idCurso)); //mandar el array a la vista
            }
        } else {
            show_404();
        }
    }
    public function CrearTitulo()
    {
    }

    public function EditarTitulo()
    {
    }

    public function BorrarTitulo()
    {
    }
}
