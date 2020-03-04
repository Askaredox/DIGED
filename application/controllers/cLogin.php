<?php
class CLogin extends CI_Controller{
    public function __construct(){
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');

        // load Session Library
        $this->load->library('session');

        // load url helper
        $this->load->helper('url');
    }
    public function index(){
        $this->load->view('vLogin');
    }
    public function user_login_process(){
        $data = array(
            'user_name' => $this->input->get('txtUser'),
            'user_pass' => $this->input->get('txtPass')
        );
        
        if($data['user_name']=="admin" && $data['user_pass']=="admin"){
            $this->session->set_userdata('logged_in', $data);
            $this->load->view('vAdmin_page');
            
            
            
        }
        else{
            $this->session->sess_destroy();
            $this->load->view('vLogin');
           
        }
        
    }
}