<?php 

Class Purchasing extends CI_Controller{
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
	public function add_rfq()
	{
		 $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('purchasing/rfq-form'));
         }else{
            $data = $this->upload->data();
        $tanggal = date('D,d-m-Y H:i');
        $no_rfq = $this->input->post('no_rfq');
        $deskripsi = $this->input->post('deskripsi');
        $budget = $this->input->post('budget');
        $deadline = $this->input->post('deadline');
        $note = $this->input->post('note');
        $lampiran = $data['file_name'];
        $customer = $this->input->post('customer');
        $jenis = $this->input->post('jenis');

        $this->db->insert('rfq',['jenis' => $jenis, 'tanggal' => $tanggal, 'no_rfq' => $no_rfq,'id_customer' => $customer , 'deskripsi' => $deskripsi , 'budget' => $budget , 'deadline' => $deadline, 'note' => $note , 'lampiran' => $lampiran]);
            swalx('success','Berhasil!','Berhasil tambah data !',base_url('purchasing/rfq-form'));

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
            swalx('error','Upload error',$this->upload->display_errors(),base_url('purchasing/po-form'));
         }else{
            $data = $this->upload->data();
        $tanggal = date('D,d-m-Y H:i');
        $no_po = $this->input->post('no_po');
        $tujuan = $this->input->post('tujuan');
        $keterangan = $this->input->post('keterangan');
        $lampiran = $data['file_name'];
        $supplier = $this->input->post('supplier');
        $item = $this->input->post('item');

        $this->db->insert('preorder',['no_po' => $no_po, 'tanggal' => $tanggal, 'tujuan' => $tujuan,'id_supplier' => $supplier , 'keterangan' => $keterangan , 'item' => $item , 'lampiran' => $lampiran]);
            swalx('success','Berhasil!','Berhasil tambah data !',base_url('purchasing/po-form'));

        }
	}
	public function add_quosupplier()
	{
		 $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('purchasing/quotation-supplier'));
         }else{
            $data = $this->upload->data();
        $tanggal = date('D,d-m-Y H:i');
        $deskripsi = $this->input->post('deskripsi');
        $note = $this->input->post('note');
        $lampiran = $data['file_name'];
        

        $this->db->insert('quosupplier',[ 'tanggal' => $tanggal, 'deskripsi' => $deskripsi , 'note' => $note , 'lampiran' => $lampiran]);
            swalx('success','Berhasil!','Berhasil tambah data !',base_url('purchasing/quotation_supplier'));

        }
	}
	public function edit_quosupplier($id)
	{
		 $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'doc|docx|pdf';
         $config['max_size']             = 2400;
         $this->upload->initialize($config);

         if(!$this->upload->do_upload('lampiran'))
         {
            swalx('error','Upload error',$this->upload->display_errors(),base_url('purchasing/quotation-supplier'));
         }else{
            $data = $this->upload->data();
        $tanggal = date('D,d-m-Y H:i');
        $deskripsi = $this->input->post('deskripsi');
        $note = $this->input->post('note');
        $lampiran = $data['file_name'];
        

        $this->db->update('quosupplier',[  'deskripsi' => $deskripsi , 'note' => $note , 'lampiran' => $lampiran] , ['id_quosupplier' => $id]);
            swalx('success','Berhasil!','Berhasil update data !',base_url('purchasing/quotation_supplier'));

        }
	}
	public function rfq_form()
	{
	$l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));

	$this->load->view('rfq_form',$l);
	}
	public function rfq_keluar()
	{
	$l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));

		$this->load->view('rfq_keluar',$l);
	}
	public function po_form()
	{
		$l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));

		$this->load->view('po_form',$l);
	}
	public function po_keluar()
	{
		$l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));

		$this->load->view('po_keluar',$l);
	}
	public function quotation_supplier()
	{
		$l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));

		$this->load->view('quotation_supplier',$l);
	}
}

 ?>