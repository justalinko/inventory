<?php

Class Master extends CI_Controller{
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
        redirect(base_url());
    }
    
    public function supplier()
    {
         $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
        $this->load->view('supplier',$l);
    }
      public function customer()
    {
        $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
        $this->load->view('customer',$l);
    }
      public function barang()
    {
        $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
        $this->load->view('barang',$l);
    }
    public function add_supplier()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $phone = $this->input->post('phone');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $website = $this->input->post('website');
        $note = $this->input->post('note');

        $this->db->insert('supplier',['nama' => $nama , 'alamat' => $alamat,'kota' => $kota,'phone' => $phone,'hp' => $hp,'email' => $email,'website' => $website,'note' => $note]);

        swalx('success','Berhasil!','Berhasil tambah data supplier!',base_url('master/supplier'));

    }
    public function edit_supplier($id)
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $phone = $this->input->post('phone');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $website = $this->input->post('website');
        $note = $this->input->post('note');

        $this->db->update('supplier',['nama' => $nama , 'alamat' => $alamat,'kota' => $kota,'phone' => $phone,'hp' => $hp,'email' => $email,'website' => $website,'note' => $note], ['id_supplier' => $id]);

        swalx('success','Berhasil!','Berhasil edit data supplier!',base_url('master/supplier'));

    }
    public function add_customer()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $divisi = $this->input->post('divisi');
        $phone = $this->input->post('phone');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $website = $this->input->post('website');
        $note = $this->input->post('note');

        $this->db->insert('customer',['nama_lengkap' => $nama , 'username' => $username,'divisi' => $divisi,'phone' => $phone,'hp' => $hp,'email' => $email,'website' => $website,'note' => $note]);

        swalx('success','Berhasil!','Berhasil tambah data customer!',base_url('master/customer'));

    }
     public function edit_customer($id)
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $divisi = $this->input->post('divisi');
        $phone = $this->input->post('phone');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $website = $this->input->post('website');
        $note = $this->input->post('note');

        $this->db->update('customer',['nama_lengkap' => $nama , 'username' => $username,'divisi' => $divisi,'phone' => $phone,'hp' => $hp,'email' => $email,'website' => $website,'note' => $note] , ['id_customer' => $id]);

        swalx('success','Berhasil!','Berhasil edit data customer!',base_url('master/customer'));

    }
     public function add_barang()
    {
        $supplier = $this->input->post('supplier');
        $tanggal = date('d M Y H:i');
        $kode = $this->input->post('kode');
        $barang = $this->input->post('barang');
        $satuan = $this->input->post('satuan');
        $harga = $this->input->post('harga');
        $note = $this->input->post('note');

        $this->db->insert('barang',['id_supplier' => $supplier , 'tanggal' => $tanggal,'kode' => $kode,'nama_barang' => $barang,'satuan' => $satuan,'harga_beli' => $harga,'note_barang' => $note]);

        swalx('success','Berhasil!','Berhasil tambah data cbarang!',base_url('master/barang'));

    }
        public function edit_barang($id)
    {
        $supplier = $this->input->post('supplier');
        $tanggal = date('d M Y H:i');
        $kode = $this->input->post('kode');
        $barang = $this->input->post('barang');
        $satuan = $this->input->post('satuan');
        $harga = $this->input->post('harga');
        $note = $this->input->post('note');

        $this->db->update('barang',['id_supplier' => $supplier , 'tanggal' => $tanggal,'kode' => $kode,'nama_barang' => $barang,'satuan' => $satuan,'harga_beli' => $harga,'note_barang' => $note] , ['id_barang' => $id]);

        swalx('success','Berhasil!','Berhasil edit data barang!',base_url('master/barang'));

    }
  
}