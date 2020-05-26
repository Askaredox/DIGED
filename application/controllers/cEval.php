<?php
class CEval extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Comprobacion_model');
        global $res;
        $resp = array(
            array(
                'tipo' => 1,
                'resp' => array(
                    'R1'
                )
            ),
            array('tipo' => 2),
            array(
                'tipo' => 3,
                'resp' => array(
                    'R1'
                )
            ),
            array(
                'tipo' => 1,
                'resp' => array(
                    'R1'
                )
            ),
            array('tipo' => 2),
            array('tipo' => 4)
        );
        $res = $resp;
    }
    public function index()
    {
        global $res;
        $resp = $res;
        //$this->getPrueba(1);
        $this->load->view('vEval', array('preguntas' => $this->getPrueba(1)));
    }
    public function addRes($opcion)
    {
        $opcion["resp"][] = "";
    }

    public function getPrueba($idTitulo)
    {
        //primero obtener el id de la comprobacion y el nombre

        if (!$test = $this->Comprobacion_model->getComprobacion(array('Titulo' => $idTitulo))) {
            return array(array(),'descr' => '');
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
            return array($preguntas,'test' => $test);
        }
    }
}
