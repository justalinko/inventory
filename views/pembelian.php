<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('accounting/pembelian/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
<a href="<?=base_url('accounting/pembelian/import');?>" class="btn btn-warning"><i class="fa fa-upload"></i> Import</a>
<a href="<?=base_url('#');?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
<a href="<?=base_url('pdfx/pembelian');?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
<a href="<?=base_url('printx/pembelian');?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<?php
if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data pembelian</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM pembelian,supplier,preorder WHERE pembelian.id_supplier=supplier.id_supplier AND preorder.id_po=pembelian.id_po ORDER BY pembelian.id_beli DESC ");
			$this->table->set_heading('No.','Tanggal','Supplier','No. PO','Rektur pajak','Nilai','Note','Lampiran','Action');$no=1;
			foreach($q->result() as $x){
			$this->table->add_row($no++,$x->tanggal,$x->nama,$x->no_po,$x->faktur_pajak,$x->nilai,$x->note,"<a href='".base_url('uploads/'.$x->lampiran)."' target='_blank'>".$x->lampiran."</a>",action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_beli));
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
				<h3>Tambah pembelian</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('accounting/add_pembelian');?>
				<label>No. PO - Supplier</label>
				<select class="form-control select2" name="no_po">
					<?php
					$c=$this->db->query("SELECT * FROM preorder ,supplier WHERE preorder.id_supplier=supplier.id_supplier");
					foreach($c->result() as $p)
					{
						echo "<option value='".$p->id_po."|".$p->id_supplier."'>".$p->no_po." - ".$p->nama."</option>";
					}
					?>
				</select>
				<br>
				<br>
				<label>Faktur Pajak</label>
				<input type="text" name="faktur_pajak" class="form-control"><br>
				<label>Nilai</label>
				<input type="text" name="nilai" class="form-control"><br>
				
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
		$this->db->delete('pembelian',['id_pembelian'=>$id]);
		swalx('success','Berhasil !','Berhasil hapus pembelian!',base_url('master/pembelian'));
	}
}
require_once('static/footer.php');