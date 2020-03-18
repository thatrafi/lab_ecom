<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin extends CI_Controller {
    private $data = null;
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('Admin/Admin_model');
        if($this->session->userdata('id_admin')!=null){
            redirect('admin');
        }
    }

	public function index()
	{
        //$this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('pass','Password','trim|required');

        if($this->form_validation->run()==false){
            $this->load->view('admin/template/header');
            $this->load->view('admin/login');
            $this->load->view('admin/template/footer');
        }else{
            $this->_login();
        }
        
    }
    
    private function _login(){
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $isEmail = $this->Admin_model->isEmailExist($email)->num_rows();
        $isMatch = $this->Admin_model->checkAdmin($email,$pass)->num_rows();
        if($isEmail>0){
           if($isMatch>0){
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Success!</div>');
            redirect('admin/login'); 
           }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Email and Password is not match! Please Try Again!</div>');
            redirect('admin/login');
           }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            You have not registered yet!</div>');
            redirect('admin/login');
        }
    }
}
