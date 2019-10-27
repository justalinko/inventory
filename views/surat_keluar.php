<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('administrasi/surat-keluar/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>

<?php
if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data Surat Keluar</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM surat WHERE jenis='keluar' ORDER BY id_surat DESC ");
			$this->table->set_heading('No','Tanggal','No. Surat','Penerima','Perihal','Note','Lampiran','Action');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_surat,$x->tanggal,$x->no_surat,$x->penerima,$x->perihal,$x->note,"<a href='".base_url('uploads/'.$x->lampiran)."' target='_blank'>".$x->lampiran."</a>",action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_surat));
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
				<h3>Tambah Surat Keluar</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('administrasi/add_surat_keluar');?>
				<label>No.Surat</label>
				<input type="text" name="no_surat" class="form-control"><br>
				<label>Penerima</label>
				<input type="text" name="penerima" class="form-control"><br>
				<label>Perihal</label>
				<input type="text" name="perihal" class="form-control"><br>
				<label>Note</label>
				<textarea class="form-control" name="note"></textarea><br>
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
		swalx('success','Berhasil !','Berhasil hapus Surat Keluar!',base_url('master/Surat Keluar'));
	}elseif($this->uri->segment(3) == 'edit')
    { $id =$this->uri->segment(4);
        $q = $this->db->get_where('surat', ['id_surat' => $id]);
        $value = $q->row();
        ?>
<br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Edit Surat Keluar</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('administrasi/edit_surat_keluar/'.$id);?>
				<label>No.Surat</label>
				<input type="text" name="no_surat" class="form-control" value="<?=$value->no_surat;?>"><br>
				<label>Penerima</label>
				<input type="text" name="penerima" class="form-control" value="<?=$value->penerima;?>"><br>
				<label>Perihal</label>
				<input type="text" name="perihal" class="form-control" value="<?=$value->perihal;?>"><br>
				<label>Note</label>
				<textarea class="form-control" name="note"><?=$value->note;?></textarea><br>
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