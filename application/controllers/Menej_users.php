<?php

Class Menej_users extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
         
        if($this->session->logged_in == "" || empty($this->session->logged_in))
        {
            redirect(base_url('auth/signin'));
            exit;
        }
    }
	public function index()
	{
		redirect(base_url('menej_users/all'));
	}
	
	public function all()
	{
	$l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
	$this->load->view('menej_users',$l);
	}
	public function add()
	{
		$l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
		$this->load->view('menej_users',$l);
	}
	public function add_users()
	{
		$user = $this->input->post('username');
		$pass = sha1($this->input->post('password'));
		$email = $this->input->post('email');
		$hp = $this->input->post('hp');
		$level = $this->input->post('level');
		$nama = $this->input->post('nama');
		
		$this->db->insert('users',['nama_lengkap' => $nama,'username' => $user , 'password' => $pass , 'level' => $level, 'hp' => $hp,'email' => $email]);
		swalx('success','Berhasil tambah data','Berhasil tambah users',base_url('menej-users/all'));
	}
}