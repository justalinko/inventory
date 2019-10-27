<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('accounting/penjualan/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
<a href="<?=base_url('accounting/penjualan/import');?>" class="btn btn-warning"><i class="fa fa-upload"></i> Import</a>
<a href="<?=base_url('#');?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
<a href="<?=base_url('pdfx/penjualan');?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
<a href="<?=base_url('printx/penjualan');?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<?php
if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data penjualan</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM penjualan,customer WHERE penjualan.id_customer=customer.id_customer ORDER BY penjualan.id_jual DESC ");
			$this->table->set_heading('No.','Tanggal','Customer','No. Invoice','Rektur pajak','Nilai','Pembayaran','Note','Lampiran','Action');$no=1;
			foreach($q->result() as $x){
			$this->table->add_row($no++,$x->tanggal,$x->nama_lengkap,$x->no_invoice,$x->faktur_pajak,$x->nilai,$x->pembayaran,$x->note,"<a href='".base_url('uploads/'.$x->lampiran)."' target='_blank'>".$x->lampiran."</a>",action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_jual));
			}
			echo $this->table->generate();
			?>
		</div>
		</div>
	</div> 
	<?php
}else
{
	if($this->uri->segment(3) == 'add')
	{
		?><br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Tambah penjualan</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('accounting/add_penjualan');?>
				<label>No. Invoice </label>
				<input type="text" name="no_invoice" class="form-control" ><br>
				<label>Customer</label>
				<select class="form-control select2" name="customer">
					<?php
					$x = $this->db->get('customer');
					foreach($x->result() as $d)
					{
						echo "<option value='".$d->id_customer."'>".$d->nama_lengkap."</option>";
					}
					?>
				</select><br>
				<br>
				<label>Faktur Pajak</label>
				<input type="text" name="faktur_pajak" class="form-control"><br>
				<label>Nilai</label>
				<input type="text" name="nilai" class="form-control"><br>
				<label>Pembayaran</label>
				<input type="text" name="pembayaran" class="form-control"><br>

				<label>Note</label>
				<textarea class="form-control" name="note"></textarea><br>
				<label>Lampiran</label>
				<input type="file" name="lampiran" class="form-control"><br>
				<input type="submit" name="submit" class="btn btn-primary btn-block" value="Tambah">
				<?=form_close();?>
			</div>
		</div>
		<?php
	}elseif($this->uri->segment(3) == 'delete')
	{
		$id = $this->uri->segment(4);
		$this->db->delete('penjualan',['id_penjualan'=>$id]);
		swalx('success','Berhasil !','Berhasil hapus penjualan!',base_url('master/penjualan'));
	}
}
require_once('static/footer.php');