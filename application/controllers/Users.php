<?php

Class Users extends CI_Controller{
	
	
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
		redirect(base_url('users/profile'));
	}
	public function logout()
	{
		session_destroy();
		redirect('auth/signin');
	}
	
	public function profile()
	{
		 $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
		$this->load->view('profile',$l);
	}
	public function setting()
	{
		 $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
		 $this->load->view('profile',$l);
		 
	}
	public function save_setting()
	{
		$nama = $this->input->post('nama');
		$user = $this->input->post('username');
		$hp = $this->input->post('hp');
		$email = $this->input->post('email');
		$pass_lama = $this->input->post('pass_lama');
		$pass_baru = $this->input->post('pass_baru');
		
		$check_pass = $this->db->get_where('users',['password' => sha1($pass_lama)])->num_rows();
		
		if($check_pass < 1)
		{
			swalx('error','Password lama salah','Password lama salah !',base_url('users/setting'));
		}else{
			$this->db->update('users',['nama_lengkap' => $nama , 'username' => $user, 'password' => sha1($pass_baru) , 'email' => $email, 'hp' => $hp]);
			swalx('success','Berhasil update data!','Profile telah di ubah!',base_url('users/profile'));
		}
	}
}