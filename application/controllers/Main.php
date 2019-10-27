<?php

Class Main extends CI_Controller{
   
    public function __construct()
    {
        parent::__construct();
        
        if($this->session->logged_in == "" || empty($this->session->logged_in))
        {
            redirect(base_url('auth/signin'));
            exit;
        }
        //$this->output->enable_profiler(TRUE);
    }
    public function index(){
 
        $l['subtitle'] = 'Dashboard';
        $l['jml_supplier'] = $this->db->get('supplier')->num_rows();
        $l['jml_customer'] = $this->db->get('customer')->num_rows();
        $l['jml_barang'] = $this->db->get('barang')->num_rows();
        $l['jml_users'] = $this->db->get('users')->num_rows(); 
        $this->load->view('dashboard',$l);
    }

}