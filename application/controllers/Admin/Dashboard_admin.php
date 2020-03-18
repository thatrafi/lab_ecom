<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('id_admin')==null){
            redirect('admin/login');
        }
    }

	public function index()
	{
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/footer');
	}
}
