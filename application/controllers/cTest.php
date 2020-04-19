<?php
class CTest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('vTest');
    }
    public function Process(){
        $datos=$_POST["d"];
        echo json_encode(array('success' => $datos));
    }
}