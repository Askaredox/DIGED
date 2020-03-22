<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_home extends CI_Controller{
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
        /*
        echo '<pre>';
        print_r($this->session->userdata());
        echo '</pre>';
        if($data['user_name']=="admin" && $data['user_pass']=="admin"){
            $this->load->view('Admin_home');
        }
        else{
            $this->session->sess_destroy();
            $this->load->view('Login');
        }
        */
        $this->load->view('Admin_home');
    }
}