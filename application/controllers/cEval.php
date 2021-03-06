             <?php
            class CEval extends CI_Controller
            {

                public function __construct()
                {
                    parent::__construct();
                    $this->load->model('Comprobacion_model');
                }
                public function index()
                {
                }
                public function editar($idCurso, $idTema, $idTitulo)
                {
                    /*
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) {
            $this->load->view('vEval', array('preguntas' => $this->getPrueba($idTitulo)));
        }
        else {
            redirect('');
        }
        */
                    global $Curso;
                    $Curso = $idCurso;
                    global $Tema;
                    $Tema = $idTema;

                    $this->load->view('vEval', array('preguntas' => $this->getPrueba($idTitulo), 'titulo' => $idTitulo));
                }
                public function getPrueba($idTitulo)
                {
                    //primero obtener el id de la comprobacion y el nombre

                    if (!$test = $this->Comprobacion_model->getComprobacion(array('Titulo' => $idTitulo))) {
                        return array(array(), 'descr' => '');
                    } else { // si existe obtener preguntas
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
                                        if ($row)
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
                                        if ($row)
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
                                        $respuesta = array();

                                        $row = $this->Comprobacion_model->getRespuestaSOPA(array('Pregunta' => $pregunta['Id_Pregunta'], 'Comprobacion' => $test->Titulo));
                                        if ($row)
                                            foreach ($row as $res) {
                                                $tmp = array(
                                                    "id_res" => $res['Id_Palabra'],
                                                    "answer" => $res['Respuesta'],
                                                    "descripcion" => $res['Descripcion']
                                                );
                                                $respuesta[] = $tmp;
                                            }
                                        break;
                                }

                                $preguntas[] = array(
                                    'id' => $pregunta['Id_Pregunta'],
                                    'Pregunta' => $pregunta['Pregunta'],
                                    'tipo' => $pregunta['Tipo_Pregunta'],
                                    'answer' => $respuesta,
                                );
                            }
                        }

                        //var_dump('<br><br><br><br><br><br><br><br>'.json_encode($preguntas));
                        //var_dump('<br><br>Descripcion prueba:' . json_encode($test));
                        return array($preguntas, 'test' => $test);
                    }
                }

                /*public function saveEval()
    {
        $test = $this->input->post('test');
        var_dump($test);
    }*/



                public function saveEval($Curso, $Tema)
                {

                    $test = $this->input->post('test');

                    // $ = $test['id'];
                    $idTest = $test['titulo'];
                    $descripcion = $test['descripcion'];
                    $exito = true;


                    if ($this->Comprobacion_model->deleteTest(array("Titulo" => $idTest))) {
                        //vamos a crearla de nuevo
                        if ($this->Comprobacion_model->createTest(array("Titulo" => $idTest, "Descripcion" => $descripcion))) {
                            //SI SE Pudo crear creamos las preguntas y respuestas
                            if (array_key_exists('preguntas', $test)) {
                                foreach ($test['preguntas'] as $valor) {
                                    //crear preguntas primero
                                    $datos1 = array(
                                        "Id_Pregunta" => $valor['id'],
                                        "Tipo_Pregunta" => $valor['tipo'],
                                        "Pregunta" => $valor['pregunta'],
                                        "Comprobacion" => $idTest
                                    );


                                    if ($this->Comprobacion_model->createQuestion($datos1) && $exito) {
                                        //creamos sus respuestas conforme el tipo de pregunta
                                        switch ($datos1["Tipo_Pregunta"]) {
                                            case 1: //vf
                                                foreach ($valor["respuestas"] as $resp) {
                                                    $datos2 = array(
                                                        "Id_VF" => $resp["id"],
                                                        "Respuesta" => $resp["correcta"],
                                                        "Pregunta" => $datos1["Id_Pregunta"],
                                                        "Comprobacion" => $idTest
                                                    );
                                                }
                                                if (!$this->Comprobacion_model->createAnswerVF($datos2)) {

                                                    $exito = false;
                                                    break;
                                                }
                                                break;
                                            case 2: //larga
                                                # code...
                                                break;
                                            case 3: //cort
                                                if (array_key_exists('respuestas', $valor)) {
                                                    foreach ($valor["respuestas"] as $resp) {
                                                        $datos2 = array(
                                                            "Id_RShort" => $resp["id"],
                                                            "Respuesta" => $resp["respuesta"],
                                                            "Pregunta" => $datos1["Id_Pregunta"],
                                                            "Comprobacion" => $idTest
                                                        );
                                                        if (!$this->Comprobacion_model->createAnswerShort($datos2)) {

                                                            $exito = false;
                                                            break;
                                                        }
                                                    }
                                                }
                                                break;
                                            case 4: //multiplr
                                                if (array_key_exists('respuestas', $valor)) {
                                                    foreach ($valor["respuestas"] as $resp) {
                                                        $datos2 = array(
                                                            "Id_RMultiple" => $resp["id"],
                                                            "Respuesta" => $resp["respuesta"],
                                                            "Booleano" => $resp["correcta"],
                                                            "Pregunta" => $datos1["Id_Pregunta"],
                                                            "Comprobacion" => $idTest
                                                        );
                                                        if (!$this->Comprobacion_model->createAnswerMul($datos2)) {

                                                            $exito = false;
                                                            break;
                                                        }
                                                    }
                                                }
                                                break;
                                            case 5: //sopita
                                                $string = "";
                                                $var = 0;
                                                foreach ($valor["matriz"] as $dimen) {

                                                    foreach ($dimen as  $charcito) {
                                                        $string = $string . $charcito;
                                                    }
                                                }

                                                $datos2 = array(
                                                    "Arreglo" => $string,
                                                    "Pregunta" => $datos1["Id_Pregunta"],
                                                    "Comprobacion" => $idTest
                                                );
                                                if (!$this->Comprobacion_model->createAnswerInt($datos2)) {
                                                    $exito = false;
                                                    break;
                                                } else {
                                                    if (array_key_exists('respuestas', $valor)) {
                                                        foreach ($valor["respuestas"] as $resp) {// crear las palabras
                                                            $datos3 = array(
                                                                "Id_Palabra" => $resp["id"],
                                                                "X0" => $resp["X0"],
                                                                "X1" => $resp["X1"],
                                                                "Y0" => $resp["Y0"],
                                                                "Y1" => $resp["Y1"],
                                                                "Respuesta" => $resp["palabra"],
                                                                "Pregunta" => $datos1["Id_Pregunta"],
                                                                "Comprobacion" => $idTest
                                                            );
                                                            if (!$this->Comprobacion_model->createPalabra($datos3)) {
                                                                $exito = false;
                                                                break;
                                                            }
                                                        }
                                                    }
                                                }
                                                break;
                                            case 6: //crucigrama
                                                $string = "";
                                                $var = 0;
                                                foreach ($valor["matriz"] as $dimen) {

                                                    foreach ($dimen as  $charcito) {
                                                        $string = $string . $charcito . ',';
                                                    }
                                                }

                                                $datos2 = array(
                                                    "Arreglo" => $string,//implode(",", $valor["matriz"][0]),
                                                    "Pregunta" => $datos1["Id_Pregunta"],
                                                    "Comprobacion" => $idTest
                                                );
                                                if (!$this->Comprobacion_model->createAnswerInt($datos2)) {
                                                    $exito = false;
                                                    break;
                                                } else {
                                                    if (array_key_exists('respuestas', $valor)) {
                                                        foreach ($valor["respuestas"] as $resp) {// crear las palabras
                                                            $datos3 = array(
                                                                "Id_Palabra" => $resp["id"],
                                                                "X0" => $resp["X0"],
                                                                "X1" => $resp["X1"],
                                                                "Y0" => $resp["Y0"],
                                                                "Y1" => $resp["Y1"],
                                                                "Respuesta" => $resp["palabra"],
                                                                "Descripcion" => $resp["descripcion"],
                                                                "Pregunta" => $datos1["Id_Pregunta"],
                                                                "Comprobacion" => $idTest
                                                            );
                                                            if (!$this->Comprobacion_model->createPalabra($datos3)) {
                                                                $exito = false;
                                                                break;
                                                            }
                                                        }
                                                    }
                                                }
                                                break;
                                            default:
                                                # code...
                                                break;
                                        }
                                    } else {
                                        $this->Comprobacion_model->deleteQuestion(array("Comprobacion" => $idTest));
                                        $this->session->set_flashdata('msge', '¡ERROR! NO SE PUDO ACTUALIZAR LA COMPROBACION');
                                        echo json_encode(array("url" => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
                                        return;
                                    }
                                }
                            }
                            // var_dump($Curso);
                            $this->session->set_flashdata('msg', '¡SE GUARDARON EXITOSAMENTE LOS CAMBIOS DE LA COMPROBACION!');
                            echo json_encode(array("url" => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
                        } else {
                            $this->session->set_flashdata('msge', '¡ERROR! NO SE PUDO ACTUALIZAR LA COMPROBACION');
                            echo json_encode(array("url" => base_url('Titulo/Administrar/' .  $Curso . '/' .  $Tema)));
                        }
                    } else { // si no se eliminó bien 
                        $this->session->set_flashdata('msge', '¡ERROR! NO SE PUDO ACTUALIZAR LA COMPROBACION');
                        echo json_encode(array("url" => base_url('Titulo/Administrar/' . $Curso . '/' . $Tema)));
                    }
                }
            }
