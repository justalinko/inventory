<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('administrasi/surat-masuk/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
<a href="<?=base_url('administrasi/surat-masuk/import');?>" class="btn btn-warning"><i class="fa fa-upload"></i> Import</a>
<a href="<?=base_url('#');?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
<a href="<?=base_url('pdfx/surat-masuk');?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
<a href="<?=base_url('printx/surat-masuk');?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<?php
if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data Surat Masuk</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM surat WHERE jenis='masuk' ORDER BY id_surat DESC ");
			$this->table->set_heading('No','Tanggal','No. Surat','Pengirim','Perihal','Tindakan','Lampiran','Action');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_surat,$x->tanggal,$x->no_surat,$x->pengirim,$x->perihal,$x->tindakan,"<a href='".base_url('uploads/'.$x->lampiran)."' target='_blank'>".$x->lampiran."</a>",action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_surat));
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
				<h3>Tambah Surat Masuk</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('administrasi/add_surat_masuk');?>
				<label>No.Surat</label>
				<input type="text" name="no_surat" class="form-control"><br>
				<label>Pengirim</label>
				<input type="text" name="pengirim" class="form-control"><br>
				<label>Perihal</label>
				<input type="text" name="perihal" class="form-control"><br>
				<label>Tindakan</label>
				<input type="text" name="tindakan" class="form-control"><br>
				<label>Lampiran</label><span>*<small>Ekstensi file yang di terima : doc,docx,pdf</small></span>
				<input type="file" name="lampiran" class="form-control"><br>
			
				<input type="submit" name="submit" class="btn btn-primary btn-block" value="Tambah">
				<?=form_close();?>
			</div>
		</div>
		<?php
	}elseif($this->uri->segment(3) == 'delete')
	{
		$id = $this->uri->segment(4);
		$this->db->delete('surat',['id_surat'=>$id]);
		swalx('success','Berhasil !','Berhasil hapus Surat Masuk!',base_url('master/Surat Masuk'));
	}elseif($this->uri->segment(3) == 'edit')
    {
        $id =$this->uri->segment(4);
        $q = $this->db->get_where('surat', ['id_surat' => $id]);
        $value = $q->row();
        ?>
<br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Edit Surat Masuk</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('administrasi/edit_surat_masuk/'.$id);?>
				<label>No.Surat</label>
				<input type="text" name="no_surat" class="form-control" value="<?=$value->no_surat;?>"><br>
				<label>Pengirim</label>
				<input type="text" name="pengirim" class="form-control" value="<?=$value->pengirim;?>"><br>
				<label>Perihal</label>
				<input type="text" name="perihal" class="form-control" value="<?=$value->perihal;?>"><br>
				<label>Tindakan</label>
				<input type="text" name="tindakan" class="form-control" value="<?=$value->tindakan;?>"><br>
				<label>Lampiran</label><span>*<small>Ekstensi file yang di terima : doc,docx,pdf</small></span>
				<input type="file" name="lampiran" class="form-control"><br>
			
				<input type="submit" name="submit" class="btn btn-primary btn-block" value="Simpan">
				<?=form_close();?>
			</div>
		</div>
<?php
    }
}
require_once('static/footer.php');