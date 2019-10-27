<?php

Class Auth extends CI_Controller{
    
    public function index()
    {
        redirect(base_url('auth/signin'));
    }
    
    public function signin()
    {
         if($this->session->has_userdata('logged_in'))
        {
            redirect(base_url('main'));
            exit;
        }
        $l['subtitle'] = 'Signin Authentication';
        $this->load->view('signin',$l);
    }
    public function auth_signin()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        if($this->dpos->auth_signin($user,$pass))
        {
            redirect(base_url());
        }else{
            redirect(base_url('auth/signin?error=1'));
        }
    }
}