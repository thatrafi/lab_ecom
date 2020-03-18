<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('id_admin')!=null){
            redirect('admin');
        }
    }

	public function index()
	{
        $this->load->view('admin/template/header');
        $this->load->view('admin/login');
        $this->load->view('admin/template/footer');
	}
}
