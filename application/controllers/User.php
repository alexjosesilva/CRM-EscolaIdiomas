<?php

class User extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('user_model');
        $this->load->library('session');

}

public function index()
{
  $this->load->view("register.php");
}

public function register_user(){

      $user=array(
      'nome'  =>$this->input->post('user_name'),
      'email' =>$this->input->post('user_email'),
      'senha' =>$this->input->post('user_password'),
      'status'=>"1"
        );
        print_r($user);

        $email_check=$this->user_model->email_check($user['email']);

if($email_check){
  $this->user_model->register_user($user);
  $this->session->set_flashdata('success_msg', 'Registrado com sucesso. Agora acesse sua conta.');
  redirect('user/login_view');

}
else{

  $this->session->set_flashdata('error_msg', 'Ocorreu um erro, tente novamente.');
  redirect('user');


}

}

public function login_view(){

$this->load->view("login.php");

}

function login_user(){
  $user_login=array(

  'email'=>$this->input->post('user_email'),
  'senha'=>$this->input->post('user_password')

    );

      $data=$this->user_model->login_user($user_login['email'],$user_login['senha']);
     

      if($data)
      {
        $this->session->set_userdata('user_id',$data['idusuario']);
        $this->session->set_userdata('user_email',$data['email']);
        $this->session->set_userdata('user_name',$data['nome']);

        $this->load->view('home.php');
        //$this->load->view('user_profile.php');

      }
      else{
        $this->session->set_flashdata('error_msg', 'Ocorreu um erro, tente novamente.');
        $this->load->view("login.php");

      }


}

function user_profile(){

$this->load->view('user_profile.php');

}
public function user_logout(){

  $this->session->sess_destroy();
  redirect('user/login_view', 'refresh');
}

}

?>
