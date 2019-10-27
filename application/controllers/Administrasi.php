<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Administrasi Extends CI_Controller{

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
    public function surat_masuk()
    {
         $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
        $this->load->view('surat_masuk',$l);
    }
     public function surat_keluar()
    {
         $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
        $this->load->view('surat_keluar',$l);
    }
     public function quotation()
    {
         $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
        $this->load->view('quotation',$l);
    }
     public function negotation()
    {
         $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
        $this->load->view('negotation',$l);
    }
     public function rfq_masuk()
    {
         $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
        $this->load->view('rfq_masuk',$l);
    }
      public function purchase_order()
    {
         $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
        $this->load->view('purchase_order',$l);
    }
      public function graphic()
    {
         $l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
        $this->load->view('graphic',$l);
    }
    public function add_surat_masuk()
    {
       

         $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('administrasi/surat-masuk/add'));
         }else{
            $data = $this->upload->data();
            $lampiran = $data['file_name'];
             $no = $this->input->post('no_surat');
             $pengirim = $this->input->post('pengirim');
            $perihal = $this->input->post('perihal');
            $tindakan = $this->input->post('tindakan');

            $this->db->insert('surat',['jenis' => 'masuk' , 'tanggal' => date('D,d-m-Y H:i') ,'no_surat' => $no , 'pengirim' => $pengirim, 'perihal' => $perihal, 'tindakan' => $tindakan, 'lampiran' => $lampiran]);
            swalx('success','Berhasil!','Berhasil tambah data !',base_url('administrasi/surat-masuk'));

         }



    }
  public function edit_surat_masuk($id)
    {
       

         $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('administrasi/surat-masuk/edit/'.$id));
         }else{
            $data = $this->upload->data();
            $lampiran = $data['file_name'];
             $no = $this->input->post('no_surat');
             $pengirim = $this->input->post('pengirim');
            $perihal = $this->input->post('perihal');
            $tindakan = $this->input->post('tindakan');

            $this->db->update('surat',['jenis' => 'masuk' , 'tanggal' => date('D,d-m-Y H:i') ,'no_surat' => $no , 'pengirim' => $pengirim, 'perihal' => $perihal, 'tindakan' => $tindakan, 'lampiran' => $lampiran], ['id_surat' => $id]);
            swalx('success','Berhasil!','Berhasil edit data !',base_url('administrasi/surat-masuk'));

         }



    }
    public function add_surat_keluar()
    {
       

         $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('administrasi/surat-keluar/add'));
         }else{
            $data = $this->upload->data();
            $lampiran = $data['file_name'];
             $no = $this->input->post('no_surat');
             $penerima = $this->input->post('penerima');
            $perihal = $this->input->post('perihal');
            $note = $this->input->post('note');

            $this->db->insert('surat',['jenis' => 'keluar' , 'tanggal' => date('D,d-m-Y H:i') ,'no_surat' => $no , 'penerima' => $penerima, 'perihal' => $perihal, 'note' => $note, 'lampiran' => $lampiran]);
            swalx('success','Berhasil!','Berhasil tambah data !',base_url('administrasi/surat-keluar'));

         }



    }
        public function edit_surat_keluar($id)
    {
       

         $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('administrasi/surat-keluar/edit/'.$id));
         }else{
            $data = $this->upload->data();
            $lampiran = $data['file_name'];
             $no = $this->input->post('no_surat');
             $penerima = $this->input->post('penerima');
            $perihal = $this->input->post('perihal');
            $note = $this->input->post('note');

            $this->db->update('surat',['jenis' => 'keluar' , 'tanggal' => date('D,d-m-Y H:i') ,'no_surat' => $no , 'penerima' => $penerima, 'perihal' => $perihal, 'note' => $note, 'lampiran' => $lampiran] , ['id_surat' => $id]);
            swalx('success','Berhasil!','Berhasil edit data !',base_url('administrasi/surat-keluar'));

         }



    }
      public function add_quotation()
    {
          $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('administrasi/quotation/add'));
         }else{
            $data = $this->upload->data();
        $tanggal = date('D,d-m-Y H:i');
        $no_quotation = $this->input->post('no_quotation');
        $deskripsi = $this->input->post('deskripsi');
        $price = $this->input->post('price');
        $validasi = $this->input->post('validasi');
        $note = $this->input->post('note');
        $lampiran = $data['file_name'];
        $customer = $this->input->post('customer');

        $this->db->insert('quotation',['tanggal' => $tanggal, 'id_customer' => $customer , 'deskripsi' => $deskripsi , 'price' => $price , 'validasi' => $validasi, 'note' => $note , 'lampiran' => $lampiran]);
            swalx('success','Berhasil!','Berhasil tambah data !',base_url('administrasi/quotation'));

        }
    }
    
       public function edit_quotation($id)
    {
          $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('administrasi/quotation/edit/'.$id));
         }else{
            $data = $this->upload->data();
        $tanggal = date('D,d-m-Y H:i');
        $no_quotation = $this->input->post('no_quotation');
        $deskripsi = $this->input->post('deskripsi');
        $price = $this->input->post('price');
        $validasi = $this->input->post('validasi');
        $note = $this->input->post('note');
        $lampiran = $data['file_name'];
        $customer = $this->input->post('customer');

        $this->db->update('quotation',['tanggal' => $tanggal, 'id_customer' => $customer , 'deskripsi' => $deskripsi , 'price' => $price , 'validasi' => $validasi, 'note' => $note , 'lampiran' => $lampiran] , ['id_quotation' => $id]);
            swalx('success','Berhasil!','Berhasil edit data !',base_url('administrasi/quotation'));

        }
    }
    public function add_negotation()
    {
          $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('administrasi/negotation/add'));
         }else{
            $data = $this->upload->data();
        $tanggal = date('D,d-m-Y H:i');
        $id_rfq = $this->input->post('no_rfq');
        $id_quo = $this->input->post('no_quo');
        $deskripsi = $this->input->post('deskripsi');
        $nego = $this->input->post('nego_price');
        //$validasi = $this->input->post('validasi');
        $note = $this->input->post('note');
        $lampiran = $data['file_name'];
             $price = $this->input->post('nego_price');
        //$customer = $this->input->post('customer');

        $this->db->insert('negotation',['tanggal' => $tanggal, 'id_rfq' => $id_rfq , 'deskripsi' => $deskripsi , 'nego_price' => $nego , 'id_quotation' => $id_quo, 'nego_note' => $note , 'nego_lampiran' => $lampiran]);
            swalx('success','Berhasil!','Berhasil tambah data !',base_url('administrasi/negotation'));

        }
    }
     public function edit_negotation($id)
    {
          $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('administrasi/negotation/edit/'.$id));
         }else{
            $data = $this->upload->data();
        $tanggal = date('D,d-m-Y H:i');
        $id_rfq = $this->input->post('no_rfq');
        $id_quo = $this->input->post('no_quo');
        $deskripsi = $this->input->post('deskripsi');
        $nego = $this->input->post('nego_price');
        //$validasi = $this->input->post('validasi');
        $note = $this->input->post('note');
        $lampiran = $data['file_name'];
        //$customer = $this->input->post('customer');

        $this->db->update('negotation',['tanggal' => $tanggal, 'id_rfq' => $id_rfq , 'deskripsi' => $deskripsi , 'nego_price' => $nego , 'id_quotation' => $id_quo, 'nego_note' => $note , 'nego_lampiran' => $lampiran] , ['id_negotation' => $id]);
            swalx('success','Berhasil!','Berhasil edit data !',base_url('administrasi/negotation'));

        }
    }

    public function add_po()
    {

         $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('administrasi/purchase-order/add'));
         }else{
            $data = $this->upload->data();
            $lampiran = $data['file_name'];
            $deadline = $this->input->post('deadline');
             $customer = $this->input->post('customer');
            $perihal = $this->input->post('perihal');
            $note = $this->input->post('note');
            $deskripsi = $this->input->post('deskripsi');

            $this->db->insert('purchase_order',['deadline' => $deadline , 'tanggal' => date('D,d-m-Y H:i'), 'id_customer' => $customer, 'deskripsi' => $deskripsi, 'note' => $note, 'lampiran_order' => $lampiran]);
            swalx('success','Berhasil!','Berhasil tambah data !',base_url('administrasi/purchase-order'));

         }
    }
    public function edit_po($id)
    {

         $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('administrasi/purchase-order'));
         }else{
            $data = $this->upload->data();
            $lampiran = $data['file_name'];
            $deadline = $this->input->post('deadline');
             $customer = $this->input->post('customer');
            $perihal = $this->input->post('perihal');
            $note = $this->input->post('note');
            $deskripsi = $this->input->post('deskripsi');

            $this->db->update('purchase_order',['deadline' => $deadline , 'tanggal' => date('D,d-m-Y H:i'), 'id_customer' => $customer, 'deskripsi' => $deskripsi, 'note' => $note, 'lampiran_order' => $lampiran] , ['id_purchase' => $id]);
            swalx('success','Berhasil!','Berhasil update data !',base_url('administrasi/purchase-order'));

         }
    }

}