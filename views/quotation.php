<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('administrasi/quotation/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
<a href="<?=base_url('administrasi/pembelian/import');?>" class="btn btn-warning"><i class="fa fa-upload"></i> Import</a>
<a href="<?=base_url('#');?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
<a href="<?=base_url('pdfx/quotation');?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
<a href="<?=base_url('printx/quotation');?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<?php
if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data Quotation</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM quotation ORDER BY id_quotation DESC ");
			$this->table->set_heading('No','Tanggal','No. Quotation','Deskripsi','Price','Validasi','Lampiran','Note','Action');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_quotation,$x->tanggal,$x->no_quotation,$x->deskripsi,$x->price,$x->validasi,"<a href='".base_url('uploads/'.$x->lampiran)."' target='_blank'>".$x->lampiran."</a>",$x->note,action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_quotation));
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
				<h3>Tambah Quotation</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('administrasi/add_quotation');?>
				<label>No.Quotation</label>
				<input type="text" name="no_quotation" class="form-control"><br>
				<label>Customer</label>
				<select class="form-control select2" name="customer">
					<?php
					$q = $this->db->get('customer');
					foreach($q->result() as $c)
					{
						echo "<option value='".$c->id_customer."'>".$c->nama_lengkap."</option>";
					}
					?>
				</select><br>
				<label>Price</label>
				<input type="number" name="price" class="form-control"><br>
				<label>Validas</label>
				<input type="text" name="validasi" class="form-control"><br>
				<label>Deskripsi</label>
				<textarea class="form-control" name="deskripsi"></textarea><br>
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
		$this->db->delete('quotation',['id_quotation'=>$id]);
		swalx('success','Berhasil !','Berhasil hapus quotation!',base_url('administrasi/quotation'));
	}elseif($this->uri->segment(3) == 'edit')
    {
        $id = $this->uri->segment(4);
        $q = $this->db->get_where('quotation',['id_quotation' => $id]);
        $value = $q->row();
        ?><br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Edit Quotation</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('administrasi/edit_quotation/'.$id);?>
				<label>No.Quotation</label>
				<input type="text" name="no_quotation" class="form-control" value="<?=$value->no_quotation;?>"><br>
				<label>Customer</label>
				<select class="form-control select2" name="customer">
					<?php
					$q = $this->db->get('customer');
					foreach($q->result() as $c)
					{
                        if($value->id_customer == $c->id_customer){
						echo "<option value='".$c->id_customer."' selected>".$c->nama_lengkap."</option>";
                        }else{
                            						echo "<option value='".$c->id_customer."'>".$c->nama_lengkap."</option>";
                        }
					}
					?>
				</select><br>
				<label>Price</label>
				<input type="number" name="price" class="form-control" value="<?=$value->price;?>"><br>
				<label>Validas</label>
				<input type="text" name="validasi" class="form-control" value="<?=$value->validasi;?>"><br>
				<label>Deskripsi</label>
				<textarea class="form-control" name="deskripsi"><?=$value->deskripsi;?></textarea><br>
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