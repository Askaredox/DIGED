<?php
   
require APPPATH . 'libraries/REST_Controller.php';
class Api extends REST_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Api_model'));
        $this->load->database();
    }
    /**
     * http://localhost/DEDEV/Api/cursos
     * https://desarrollo.virtual.usac.edu.gt/DEDEV/Api/cursos
     */
    public function cursos_get()
	{
        $data=$this->Api_model->getCursos();

        $this->response($data, REST_Controller::HTTP_OK);
    }
    /**
     * http://localhost/DEDEV/Api/temas/4
     * https://desarrollo.virtual.usac.edu.gt/DIGED/Api/temas/4
     */
    public function temas_get($id){
        if(!is_numeric($id))
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
        $data=$this->Api_model->getTemas($id);
        if($data)
            $this->response($data, REST_Controller::HTTP_OK);
        else
            $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
        
    }
}