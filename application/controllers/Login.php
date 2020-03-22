<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
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
        $this->load->view('login');
    }
    public function user_login_process(){
        $controller = "Admin_home";
        $method = "index";
        $data = array(
            'user_name' => $this->input->get('txtUser'),
            'user_pass' => $this->input->get('txtPass')
        );
        
        $this->session->set_userdata('logged_in', $data);
        echo '<pre>';
        print_r($this->session->userdata());
        echo '</pre>';
    }
}