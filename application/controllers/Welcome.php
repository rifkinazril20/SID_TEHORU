<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function cekid()
	{
		$username=clear($_POST['username']);
		$password=clear($_POST['password']);
		$q=$this->db->query("select * from admin where  username='$username' and password=md5(md5(md5('$password')))");
		if($q->num_rows()>0){
			$row=$q->row();
			$data = array(
					'id'  => $row->id,
					'nama'     => $row->nama,
					'level' => $row->level,
					'telp' => $row->telp,
			);
			$this->session->set_userdata($data);
			echo 'main/index';
		}else{
				echo false;
		}

	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome/index');
	}



	//daftar

	public function daftar()
	{
		$this->load->view('daftar');
	}

}
