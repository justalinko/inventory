<?php
@ob_start();
Class Pdfx extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
         
        if($this->session->logged_in == "" || empty($this->session->logged_in))
        {
            redirect(base_url('auth/signin'));
            exit;
        }
    }
	public function htmlpdf($html,$output)
	{
		require_once(APPPATH.'/third_party/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P','A4','en');
		$pdf->writeHTML($html);
		$pdf->Output($output,'D');
	}
	public function supplier()
	{
		$this->dpos->table_print();
		$q = $this->db->query("SELECT * FROM supplier ORDER BY id_supplier DESC ");
			$this->table->set_heading('ID','Nama supplier','Alamat','Kota','Telphone','HP','PIC','Email','Website','Note');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_supplier,$x->nama,$x->alamat,$x->kota,$x->phone,$x->hp,$x->picture,$x->email,$x->website,$x->note);
			}
		$this->htmlpdf($this->table->generate(),'supplier-'.date('d_m_Y').'.pdf');
	}

		public function customer()
	{
			$this->dpos->table_print();
			$q = $this->db->query("SELECT * FROM customer ORDER BY id_customer DESC ");
			$this->table->set_heading('ID','Nama customer','Username','Divisi','Telphone','HP','Email','Website','Note');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_customer,$x->nama_lengkap,$x->username,$x->divisi,$x->phone,$x->hp,$x->email,$x->website,$x->note);
			}
		$this->htmlpdf($this->table->generate(),'customer-'.date('d_m_Y').'.pdf');
			
	}
	public function barang()
	{
		$this->dpos->table_print();
			$q = $this->db->query("SELECT * FROM barang,supplier WHERE barang.id_supplier=supplier.id_supplier ORDER BY barang.id_barang DESC ");
			$this->table->set_heading('ID','Nama Supplier','Nama Barang','Kode','Satuan','Harga beli','Note');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_barang,$x->nama,$x->nama_barang,$x->kode,$x->satuan,rupiah($x->harga_beli),$x->note_barang);
			}
		$this->htmlpdf($this->table->generate(),'barang-'.date('d_m_Y').'.pdf');
	}
	public function penjualan()
	{
		$this->dpos->table_print();
		$q = $this->db->query("SELECT * FROM penjualan,customer WHERE penjualan.id_customer=customer.id_customer ORDER BY penjualan.id_jual DESC ");
			$this->table->set_heading('No.','Tanggal','Customer','No. Invoice','Rektur pajak','Nilai','Pembayaran','Note','Lampiran');$no=1;
			foreach($q->result() as $x){
			$this->table->add_row($no++,$x->tanggal,$x->nama_lengkap,$x->no_invoice,$x->faktur_pajak,$x->nilai,$x->pembayaran,$x->note,$x->lampiran);
			}
		
		$this->htmlpdf($this->table->generate(),'penjualan-'.date('d_m_Y').'.pdf');
	}
	public function surat_masuk()
	{
		$this->dpos->table_print();
		$q = $this->db->query("SELECT * FROM surat WHERE jenis='masuk' ORDER BY id_surat DESC ");
			$this->table->set_heading('No','Tanggal','No. Surat','Pengirim','Perihal','Tindakan','Lampiran');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_surat,$x->tanggal,$x->no_surat,$x->pengirim,$x->perihal,$x->tindakan,$x->lampiran);
			}
		$this->htmlpdf($this->table->generate(),'surat-masuk-'.date('d_m_Y').'.pdf');
	}
	public function surat_keluar()
	{
		$this->dpos->table_print();
		$q = $this->db->query("SELECT * FROM surat WHERE jenis='keluar' ORDER BY id_surat DESC ");
			$this->table->set_heading('No','Tanggal','No. Surat','Pengirim','Perihal','Tindakan','Lampiran');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_surat,$x->tanggal,$x->no_surat,$x->pengirim,$x->perihal,$x->tindakan,$x->lampiran);
			}
		$this->htmlpdf($this->table->generate(),'surat-keluar-'.date('d_m_Y').'.pdf');
	}

	public function quotation()
	{
		$this->dpos->table_print();
		$q = $this->db->query("SELECT * FROM quotation ORDER BY id_quotation DESC ");
			$this->table->set_heading('No','Tanggal','No. Quotation','Deskripsi','Price','Validasi','Lampiran','Note');$no=1;
			foreach($q->result() as $x){
			$this->table->add_row($no++,$x->tanggal,$x->no_quotation,$x->deskripsi,$x->price,$x->validasi,$x->lampiran,$x->note);
			}
			$this->htmlpdf($this->table->generate(),'quotation-'.date('d_m_Y').'.pdf');
	}

	public function negotation()
	{
$this->dpos->table_print();
		$q = $this->db->query("SELECT * FROM negotation,quotation,rfq WHERE negotation.id_quotation=quotation.id_quotation AND rfq.id_rfq=negotation.id_rfq ORDER BY negotation.id_negotation DESC ");
			$this->table->set_heading('No.','Tanggal','Deskripsi','No. RFQ','No. Quo','Price','Nego price','Note','Lampiran');$no=1;
			foreach($q->result() as $x){
			$this->table->add_row($no++,$x->tanggal,$x->deskripsi,$x->no_rfq,$x->no_quotation,$x->price,$x->nego_price,$x->nego_note,$x->lampiran);
			}
		$this->htmlpdf($this->table->generate(),'quotation-'.date('d_m_Y').'.pdf');
	}
	public function purchase_order()
	{
		$this->dpos->table_print();
		$q = $this->db->query("SELECT * FROM purchase_order,customer WHERE purchase_order.id_customer=customer.id_customer ORDER BY purchase_order.id_purchase DESC ");
			$this->table->set_heading('No.','Tanggal','Customer','Deskripsi','Deadline','Note','lampiran');$no=1;
			foreach($q->result() as $x){
			$this->table->add_row($no++,$x->tanggal,$x->nama_lengkap,$x->deskripsi,$x->deadline,$x->note,$x->lampiran_order);
			}
		$this->htmlpdf($this->table->generate(),'purchase_order-'.date('d_m_Y').'.pdf');

	}
	public function quotation_supplier()
	{
		$this->dpos->table_print();
			$q = $this->db->query("SELECT * FROM quosupplier ORDER BY id_quosupplier DESC ");
			$this->table->set_heading('No.','Tanggal','Deskripsi','Note','lampiran');$no=1;
			foreach($q->result() as $x){
			$this->table->add_row($no++,$x->tanggal,$x->deskripsi,$x->note,$x->lampiran_order);
			}
			$this->htmlpdf($this->table->generate(),'purchase_order-'.date('d_m_Y').'.pdf');
	}


}