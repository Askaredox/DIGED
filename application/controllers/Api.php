<?php
   
require APPPATH . 'libraries/REST_Controller.php';
class Api extends REST_Controller{
    protected $allowed_http_methods = array('get', 'delete', 'post', 'put');
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
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        $data=$this->Api_model->getCursos();

        $this->response($data, REST_Controller::HTTP_OK);
    }
    /**
     * http://localhost/DEDEV/Api/temas/4
     * https://desarrollo.virtual.usac.edu.gt/DIGED/Api/temas/4
     */
    public function temas_get($id){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        if(!is_numeric($id)){
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);
            return;
        }
        $data=$this->Api_model->getTemas($id);
        if($data)
            $this->response($data, REST_Controller::HTTP_OK);
        else
            $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
        
    }
    /**
     * http://localhost/DEDEV/Api/img/2
     * https://desarrollo.virtual.usac.edu.gt/DIGED/Api/img/2
    */
    public function img_get($id){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        $data1=$this->Api_model->getTemaImg($id);
        $data2=$this->Api_model->getTituloCords($id);

        if(!$data1){
            $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
            return;
        }

        $data=[
            "Tema"=>$data1->Nombre_T,
            "Imagen"=>$this->img_base64($data1->Imagen),
            "coordenadas"=>array($data2)
        ];

        $this->response($data, REST_Controller::HTTP_OK);
        
    }
    /**
     * http://localhost/DEDEV/Api/titulo/2
     * https://desarrollo.virtual.usac.edu.gt/DIGED/Api/titulo/2
    */
    public function titulo_get($id){
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
        $data=$this->Api_model->getContenido($id);
        if($data)
            $this->response($data, REST_Controller::HTTP_OK);
        else
            $this->response(NULL, REST_Controller::HTTP_NOT_FOUND);
    }



    
    
    private function img_base64($path){
        if(is_file('./'.$path)){
            $img = file_get_contents('./'.$path);
            return base64_encode($img);
        }
        else{
            return null;
        }
    }
}