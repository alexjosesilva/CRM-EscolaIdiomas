<?php

class Aluno extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('aluno_model');
        $this->load->library('session');

}

public function index()
{
  $this->load->view("login.php");
}


public function novo_aluno(){

      $aluno=array(
      'nome'  =>$this->input->post('nome'),
      'email' =>$this->input->post('email'),
      'senha' =>$this->input->post('senha'),
      'status'=>$this->input->post('status'),
        );
      $email_check=$this->aluno_model->email_check($aluno['email']);

  if($email_check){
    $this->aluno_model->register_aluno($aluno);
     redirect('aluno/aluno_profile');
  }
else{

  $this->session->set_flashdata('error_msg', 'Ocorreu um erro, tente novamente.');
  redirect('aluno');
  }
}

public function register_aluno(){

      $aluno=array(
      'nome'  =>$this->input->post('nome'),
      'email' =>$this->input->post('email'),
      'senha' =>$this->input->post('senha'),
      'status'=>$this->input->post('status'),
        );
        print_r($aluno);

        $email_check=$this->aluno_model->email_check($aluno['email']);

if($email_check){
  $this->aluno_model->register_aluno($aluno);
  $this->session->set_flashdata('success_msg', 'Registrado com sucesso. Agora acesse sua conta.');
  
  redirect('aluno/login_view');

}
else{

  $this->session->set_flashdata('error_msg', 'Ocorreu um erro, tente novamente.');
  redirect('aluno');
  }
}

public function update_aluno(){

    $aluno=array(
      'idaluno'       =>$this->input->post('idaluno'),
      'nomealuno'     =>$this->input->post('nomealuno'),
      'emailaluno'    =>$this->input->post('emailaluno'),
      'matricula'     =>$this->input->post('matricula'),
      'endereco'      =>$this->input->post('endereco'),
      'turma'         =>$this->input->post('turma'),
        );

    $this->aluno_model->updatealuno($aluno);
    $this->session->set_flashdata('success_msg', 'Atualizado com sucesso.');
    redirect('aluno/aluno_profile');
}


public function login_view(){

  $this->load->view("login.php");

}

public function register_view(){

  $this->load->view("register.php");

}

function login_aluno(){
  $aluno_login=array(

  'email'=>$this->input->post('aluno_email'),
  'senha'=>$this->input->post('aluno_password')

    );

      $data=$this->aluno_model->login_aluno($aluno_login['email'],$aluno_login['senha']);
     

      if($data)
      {
        $this->session->set_alunodata('aluno_id',$data['idusuario']);
        $this->session->set_alunodata('aluno_email',$data['email']);
        $this->session->set_alunodata('aluno_name',$data['nome']);
       
        $this->load->view('aluno/home');

      }
      else{
        $this->session->set_flashdata('error_msg', 'Ocorreu um erro, tente novamente.');
        $this->load->view("login");
      }
}

function aluno_profile(){
  $this->load->view('aluno/home.php');
}



// Alterar
public function alterarAluno($id){


  $usuario['aluno']= $this->aluno_model->buscarAluno($id);


  $this->load->view('aluno/home', $usuario);



}


// Excluir
public function excluirAluno($id){

  $dados['idualuno']   = $id;
  $this->aluno_model->excluirUsuario($id);
  $this->load->view('aluno/home', $dados);

}


/**
* Sair do Sistema
*/
public function aluno_logout(){

  $this->session->sess_destroy();
  redirect('aluno/login_view', 'refresh');
}

}

?>
