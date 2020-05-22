<?php
class CEval extends CI_Controller{
    public function __construct(){
        parent::__construct();
        global $res;
        $resp = array(
            array(
                'tipo'=>1,
                'resp'=>array(
                    'R1'
                )
            ),
            array('tipo'=>2),
            array(
                'tipo'=>3,
                'resp'=>array(
                    'R1'
                )
            ),
            array(
                'tipo'=>1,
                'resp'=>array(
                    'R1'
                )
            ),
            array('tipo'=>2),
            array('tipo'=>4)
        );
        $res=$resp;
    }
    public function index(){
        global $res;
        $resp=$res;
        $this->load->view('vEval',array('preguntas'=>$resp));
    }
    public function addRes($opcion){
        $opcion["resp"][]="";
    }
}