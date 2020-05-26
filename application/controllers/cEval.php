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
    public function getPrueba($idTitulo)
    {
        //primero obtener el id de la comprobacion y el nombre

        if (!$test = $this->Comprobacion_model->getComprobacion(array('Titulo' => $idTitulo))) {
            return array(array(), 'descr' => '');
        } else { // si existe obtener preguntas
            $preguntas = array();

            $preg = $this->Comprobacion_model->getPreguntas(array('Comprobacion' => $test->Id_Comprobacion));

            foreach ($preg as $pregunta) {
                //$respuestas = array();
                // averiguar sus respuestas 

                switch ($pregunta['Tipo_Pregunta']) {
                    case 1: // vf
                        $row = $this->Comprobacion_model->getRespuestaVF(array('Pregunta' => $pregunta['Id_Pregunta'], 'Comprobacion' => $test->Id_Comprobacion));

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

                        $row = $this->Comprobacion_model->getRespuestaCORTA(array('Pregunta' => $pregunta['Id_Pregunta'], 'Comprobacion' => $test->Id_Comprobacion));

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

                        $row = $this->Comprobacion_model->getRespuestaMULTIPLE(array('Pregunta' => $pregunta['Id_Pregunta'], 'Comprobacion' => $test->Id_Comprobacion));

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

                        break;
                    case 6: // crucigrama

                        break;
                }

                $preguntas[] = array(
                    'id' => $pregunta['Id_Pregunta'],
                    'Pregunta' => $pregunta['Pregunta'],
                    'tipo' => $pregunta['Tipo_Pregunta'],
                    'answer' => $respuesta,
                );
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
    public function saveEval()
    {
        $test = $this->input->post('test');
        //var_dump($test);

        $idTest = $test['id'];
        $idTitulo = $test['titulo'];
        $descripcion = $test['descripcion'];
        $exito = true;


        if ($this->Comprobacion_model->deleteTest(array("Id_Comprobacion" => $idTest, "Titulo" => $idTitulo))) {
            //vamos a crearla de nuevo
            if ($this->Comprobacion_model->createTest(array("Id_Comprobacion" => $idTest, "Titulo" => $idTitulo, "Descripcion" => $descripcion))) {
                //SI SE Pudo crear creamos las preguntas y respuestas
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
                                    $this->Comprobacion_model->deleteAnswerVF(array("Comprobacion" => $idTest));
                                    $this->Comprobacion_model->deleteAnswerShort(array("Comprobacion" => $idTest));
                                    $this->Comprobacion_model->deleteAnswerMul(array("Comprobacion" => $idTest));
                                    $exito = false;
                                    break;
                                }
                                break;
                            case 2: //larga
                                # code...
                                break;
                            case 3: //cort
                                foreach ($valor["respuestas"] as $resp) {
                                    $datos2 = array(
                                        "Id_RShort" => $resp["id"],
                                        "Respuesta" => $resp["respuesta"],
                                        "Pregunta" => $datos1["Id_Pregunta"],
                                        "Comprobacion" => $idTest
                                    );
                                    if (!$this->Comprobacion_model->createAnswerShort($datos2)) {
                                        $this->Comprobacion_model->deleteAnswerVF(array("Comprobacion" => $idTest));
                                        $this->Comprobacion_model->deleteAnswerShort(array("Comprobacion" => $idTest));
                                        $this->Comprobacion_model->deleteAnswerMul(array("Comprobacion" => $idTest));
                                        $exito = false;
                                        break;
                                    }
                                }
                                break;
                            case 4: //multiplr
                                foreach ($valor["respuestas"] as $resp) {
                                    $datos2 = array(
                                        "Id_RMultiple" => $resp["id"],
                                        "Respuesta" => $resp["respuesta"],
                                        "Booleano" => $resp["correcta"],
                                        "Pregunta" => $datos1["Id_Pregunta"],
                                        "Comprobacion" => $idTest
                                    );
                                    if (!$this->Comprobacion_model->createAnswerMul($datos2)) {
                                        $this->Comprobacion_model->deleteAnswerVF(array("Comprobacion" => $idTest));
                                        $this->Comprobacion_model->deleteAnswerShort(array("Comprobacion" => $idTest));
                                        $this->Comprobacion_model->deleteAnswerMul(array("Comprobacion" => $idTest));
                                        $exito = false;
                                        break;
                                    }
                                }
                                break;
                            case 5: //sopita
                                # code...
                                break;
                            case 6: //crucigrama
                                # code...
                                break;
                            default:
                                # code...
                                break;
                        }
                    } else {
                        $this->Comprobacion_model->deleteQuestion(array("Comprobacion" => $idTest));
                        var_dump("ERROR POR PREGUNTA");
                        break;
                    }
                }
            } else {
                var_dump("ERROR");
            }
        } else { // si no se eliminó bien
            var_dump("no eliminado");
        }
    }

    public function editar($idCurso,$idTitulo){
        /*
        if ($this->session->userdata('is_logged') && ($this->session->userdata('Tipo') == 2)) {
            $this->load->view('vEval', array('preguntas' => $this->getPrueba($idTitulo)));
        }
        else {
            redirect('');
        }
        */
        $this->load->view('vEval', array('preguntas' => $this->getPrueba(1)));
    }
}
