<?php

require APPPATH . 'libraries/REST_Controller.php';
class Api extends REST_Controller
{
    protected $allowed_http_methods = array('get', 'delete', 'post', 'put');
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Api_model', 'Comprobacion_model'));
        $this->load->database();
    }
    /**
     * http://localhost/DEDEV/Api/cursos
     * https://desarrollo.virtual.usac.edu.gt/DEDEV/Api/cursos
     */
    public function cursos_get()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        $data = $this->Api_model->getCursos();

        $this->response($data, REST_Controller::HTTP_OK);
    }
    /**
     * http://localhost/DEDEV/Api/temas/4
     * https://desarrollo.virtual.usac.edu.gt/DIGED/Api/temas/4
     */
    public function temas_get($id)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        if (!is_numeric($id)) {
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            return;
        }
        $data = $this->Api_model->getTemas($id);
        if ($data)
            $this->response($data, REST_Controller::HTTP_OK);
        else
            $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
    }
    /**
     * http://localhost/DEDEV/Api/img/2
     * https://desarrollo.virtual.usac.edu.gt/DIGED/Api/img/2
     */
    public function img_get($id)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        $data1 = $this->Api_model->getTemaImg($id);
        $data2 = $this->Api_model->getTituloCords($id);

        if (!$data1) {
            $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
            return;
        }

        $data = [
            "Tema" => $data1->Nombre_T,
            "Imagen" => $this->img_base64($data1->Imagen),
            "coordenadas" => array($data2)
        ];

        $this->response($data, REST_Controller::HTTP_OK);
    }
    /**
     * http://localhost/DEDEV/Api/titulo/2
     * https://desarrollo.virtual.usac.edu.gt/DIGED/Api/titulo/2
     */
    public function titulo_get($id)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        $data = $this->Api_model->getContenido($id);
        if ($data)
            $this->response($data, REST_Controller::HTTP_OK);
        else
            $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
    }
    /**
     * http://localhost/DEDEV/Api/comprobacion/2
     * https://desarrollo.virtual.usac.edu.gt/DIGED/Api/comprobacion/2
     */
    public function comprobacion_get($idTitulo)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }
        $test = $this->Comprobacion_model->getComprobacion(array('Titulo' => $idTitulo));
        if ($test) {
            //$this->response($test, REST_Controller::HTTP_OK);
            $preguntas = array();
            $preg = $this->Comprobacion_model->getPreguntas(array('Comprobacion' => $test->Titulo));

            if ($preg) {
                foreach ($preg as $pregunta) {
                    //$respuestas = array();
                    // averiguar sus respuestas 

                    switch ($pregunta['Tipo_Pregunta']) {
                        case 1: // vf
                            $row = $this->Comprobacion_model->getRespuestaVF(array('Pregunta' => $pregunta['Id_Pregunta'], 'Comprobacion' => $test->Titulo));

                            $respuesta = array(
                                array(
                                    "id_res" => $row->Id_VF,
                                    "answer" => $row->Respuesta
                                )

                            );
                            break;
                        case 2: // larga

                            $respuesta = array();

                            break;
                        case 3: // corta
                            $respuesta = array();

                            $row = $this->Comprobacion_model->getRespuestaCORTA(array('Pregunta' => $pregunta['Id_Pregunta'], 'Comprobacion' => $test->Titulo));

                            foreach ($row as $res) {
                                $tmp = array(
                                    "id_res" => $res['Id_RShort'],
                                    "answer" => $res['Respuesta']
                                );
                                $respuesta[] = $tmp;
                            }

                            break;
                        case 4: // multiple
                            $respuesta = array();

                            $row = $this->Comprobacion_model->getRespuestaMULTIPLE(array('Pregunta' => $pregunta['Id_Pregunta'], 'Comprobacion' => $test->Titulo));

                            foreach ($row as $res) {
                                $tmp = array(
                                    "id_res" => $res['Id_RMultiple'],
                                    "answer" => $res['Respuesta'],
                                    "correcta" => $res['Booleano']
                                );
                                $respuesta[] = $tmp;
                            }

                            break;
                        case 5: // sopita
                            $respuesta = array();

                            $row = $this->Comprobacion_model->getRespuestaSOPA(array('Pregunta' => $pregunta['Id_Pregunta'], 'Comprobacion' => $test->Titulo));

                            foreach ($row as $res) {
                                $tmp = array(
                                    "id_res" => $res['Id_Palabra'],
                                    "answer" => $res['Respuesta'],
                                    "correcta" => "1"
                                );
                                $respuesta[] = $tmp;
                            }

                            break;
                        case 6: // crucigrama

                            break;
                    }

                    $preguntas[] = array(
                        'id' => $pregunta['Id_Pregunta'],
                        'Pregunta' => $pregunta['Pregunta'],
                        'tipo' => $pregunta['Tipo_Pregunta'],
                        'respuestas' => $respuesta
                    );
                }

                $data = array(
                    'ID' => $test->Titulo,
                    'DESCRIPCION' => $test->Descripcion,
                    'PREGUNTAS' => $preguntas
                );
                $this->response($data, REST_Controller::HTTP_OK);
            } else {
                $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
            }
        } else {
            $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    private function img_base64($path)
    {
        if (is_file('./' . $path)) {
            $img = file_get_contents('./' . $path);
            return base64_encode($img);
        } else {
            return null;
        }
    }
}
