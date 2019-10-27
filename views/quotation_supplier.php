<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('purchasing/quotation-supplier/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
<a href="<?=base_url('purchasing/quotation-supplier/import');?>" class="btn btn-warning"><i class="fa fa-upload"></i> Import</a>
<a href="<?=base_url('excel-export/quotation-supplier');?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
<a href="<?=base_url('pdfx/quotation-supplier');?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
<a href="<?=base_url('printx/quotation-supplier');?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<?php
if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data Quotation Supplier</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM quosupplier ORDER BY id_quosupplier DESC ");
			$this->table->set_heading('No.','Tanggal','Deskripsi','Note','lampiran','Action');$no=1;
			foreach($q->result() as $x){
			$this->table->add_row($no++,$x->tanggal,$x->deskripsi,$x->note,"<a href='".base_url('uploads/'.$x->lampiran)."' target='_blank'>".$x->lampiran_order."</a>",action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_quosupplier));
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
				<h3>Tambah Quotation supplier</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('purchasing/add_quosupplier');?>
				
			

				<label>Deskripsi</label>
				<textarea class="form-control" name="deskripsi"></textarea><br>
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
		$this->db->delete('quosupplier',['id_quosupplier'=>$id]);
		swalx('success','Berhasil !','Berhasil hapus quotation supplier!',base_url('purchasing/quotation-supplier'));
	}elseif($this->uri->segment(3) == 'edit')
	{
		$id = $this->uri->segment(4);
		$q = $this->db->get_where('quosupplier',['id_quosupplier' => $id]);
		$value = $q->row();

		?>
<br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Edit Quotation supplier</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('purchasing/edit_quosupplier/'.$id);?>
		
				<label>Deskripsi</label>
				<textarea class="form-control" name="deskripsi"><?=$value->deskripsi;?></textarea><br>
				<label>Note</label>
				<textarea class="form-control" name="note"><?=$value->note;?></textarea><br>
				<label>Lampiran</label>
				<input type="file" name="lampiran" class="form-control"><br>
				<input type="submit" name="submit" class="btn btn-primary btn-block" value="Tambah">
				<?=form_close();?>
			</div>
		</div>
		<?php
	}
}
require_once('static/footer.php');