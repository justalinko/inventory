<?php


Class Accounting extends CI_Controller
{

	public function index()
	{
		redirect(base_url());
	}

	public function penjualan()
	{
		$l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
		$this->load->view('penjualan',$l);
	}

	public function pembelian()
	{
		$l['subtitle'] = ucwords($this->uri->segment(1)).' / '.ucwords($this->uri->segment(2));
		$this->load->view('pembelian',$l);
	}

	public function add_penjualan()
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
		$customer = $this->input->post('customer');
		$no_inv = $this->input->post('no_invoice');
		$fakturpjk = $this->input->post('faktur_pajak');
		$nilai = $this->input->post('nilai');
		$pembayaran = $this->input->post('pembayaran');
		$note = $this->input->post('note');
		$lampiran = $data['file_name'];

		$this->db->insert('penjualan',['tanggal' => $tanggal,'id_customer' => $customer , 'no_invoice' => $no_inv , 'faktur_pajak' => $fakturpjk , 'nilai' => $nilai, 'pembayaran' => $pembayaran , 'note' => $note , 'lampiran' => $lampiran]);
		swalx('success','Berhasil tambah data','Berhasil tambah penjualan',base_url('accounting/penjualan'));
		}


	}
	public function add_pembelian()
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
         $posu = explode("|",$this->input->post('no_po'));
		$tanggal = date('D,d-m-Y H:i');
		$supplier = $posu[1];
		$no_po = $posu[0];
		$fakturpjk = $this->input->post('faktur_pajak');
		$nilai = $this->input->post('nilai');
		//$pembayaran = $this->input->post('pembayaran');
		$note = $this->input->post('note');
		$lampiran = $data['file_name'];

		$this->db->insert('pembelian',['tanggal' => $tanggal,'id_supplier' => $supplier , 'id_po' => $no_po , 'faktur_pajak' => $fakturpjk , 'nilai' => $nilai, 'note' => $note , 'lampiran' => $lampiran]);
		swalx('success','Berhasil tambah data','Berhasil tambah penjualan',base_url('accounting/pembelian'));
		}


	}
}