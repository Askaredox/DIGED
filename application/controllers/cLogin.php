<?php
class CLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');

        // load Session Library
        $this->load->library('session');

        // load url helper
        $this->load->helper(array('url', 'Login'));

        // load modelo para login
        $this->load->model(array('Login_model'));
    }
    public function index()
    {
        $this->load->view('vLogin');
    }
    public function user_login_process()
    {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules(getLoginRules());
        if ($this->form_validation->run() === FALSE) {
            $error = array(
                'txtUser' => form_error('txtUser'),
                'txtPass' => form_error('txtPass'),
            );
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($error));
        } else {
            $data = array(
                'Nombre' => $this->input->post('txtUser'),
                'Contraseña' => $this->input->post('txtPass')
            );

            if (!$row = $this->Login_model->LoginUser($data)) {
                $this->output
                    ->set_status_header(401)
                    ->set_output(json_encode(array('msg'=>'Verifique sus Credenciales')));
            } else {
                $data= array(
                    'Id_Usuario'=>$row->Id_Usuario,
                    'Nombre'=>$row->Nombre,
                    'Apellido'=>$row->Apellido,
                    'Contraseña'=>$row->Contraseña,
                    'Tipo'=> $row->Tipo,
                    'is_logged'=>TRUE
                );
               // var_dump(json_encode($data));
                $this->session->set_userdata($data);
                $this->session->set_flashdata('msg','Bienvenido al sistema  '.$data['Nombre'].' ' .$data['Apellido']);
                if($data['Tipo']==1){//Admin
                   $this->output->set_output(json_encode(array('url'=>base_url('Administracion'))));                    
                }else{//docente
                    $this->output->set_output(json_encode(array('url'=>base_url('HOME'))));
                }
               


            }
        }
    }

    public function logout(){
        $vars = array('Id_Usuario','Nombre','Apellido','Contraseña','Tipo','is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy;
		redirect('');
    }
}
