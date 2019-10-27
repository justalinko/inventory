<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('master/supplier/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
<a href="<?=base_url('master/supplier/import');?>" class="btn btn-warning"><i class="fa fa-upload"></i> Import</a>
<a href="<?=base_url('excel-export/supplier');?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
<a href="<?=base_url('pdfx/supplier');?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
<a href="<?=base_url('printx/supplier');?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<?php
if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data supplier</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive" id="print">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM supplier ORDER BY id_supplier DESC ");
			$this->table->set_heading('ID','Nama supplier','Alamat','Kota','Telphone','HP','PIC','Email','Website','Note','Action');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_supplier,$x->nama,$x->alamat,$x->kota,$x->phone,$x->hp,$x->pic,$x->email,$x->website,$x->note,action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_supplier));
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
				<h3>Tambah Supplier</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open('master/add_supplier');?>
				<label>Nama</label>
				<input type="text" name="nama" class="form-control"><br>
				<label>Alamat</label>
				<textarea class="form-control" name="alamat"></textarea><br>
				<label>Kota</label>
				<input type="text" name="kota" class="form-control"><br>
				<label>Phone</label>
				<input type="tel" name="phone" class="form-control"><br>
				<label>HP</label>
				<input type="tel" name="hp" class="form-control"><br>
				<label>PIC</label>
				<input type="text" name="pic" class="form-control"><br>
				<label>Email</label>
				<input type="email" name="email" class="form-control"><br>
						<label>Website</label>
				<input type="text" name="website" class="form-control"><br>
				<label>Note</label>
				<textarea class="form-control" name="note"></textarea><br>


				<input type="submit" name="submit" class="btn btn-primary btn-block" value="Tambah">
				<?=form_close();?>
			</div>
		</div>
		<?php
	}elseif($this->uri->segment(3) == 'delete')
	{
		$id = $this->uri->segment(4);
		$this->db->delete('supplier',['id_supplier'=>$id]);
		swalx('success','Berhasil !','Berhasil hapus supplier!',base_url('master/supplier'));
	}elseif($this->uri->segment(3) == 'edit'){
        $id = $this->uri->segment(4);
        $p = $this->db->get_where('supplier',['id_supplier' => $this->uri->segment(4)]);
        $value = $p->row();
        ?><br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Edit Supplier</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open('master/edit_supplier/'.$id);?>
				<label>Nama</label>
				<input type="text" name="nama" class="form-control" value="<?=$value->nama;?>"><br>
				<label>Alamat</label>
				<textarea class="form-control" name="alamat"><?=$value->alamat;?></textarea><br>
				<label>Kota</label>
				<input type="text" name="kota" class="form-control" value="<?=$value->kota;?>"><br>
				<label>Phone</label>
				<input type="tel" name="phone" class="form-control" value="<?=$value->phone;?>"><br>
				<label>HP</label>
				<input type="tel" name="hp" class="form-control" value="<?=$value->hp;?>"><br><label>PIC</label>
				<input type="text" name="pic" class="form-control" value="<?=$value->pic;?>"><br>
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="<?=$value->email;?>"><br>
						<label>Website</label>
				<input type="text" name="website" class="form-control" value="<?=$value->website;?>" input><br>
				<label>Note</label>
				<textarea class="form-control" name="note"><?=$value->note;?></textarea><br>


				<input type="submit" name="submit" class="btn btn-primary btn-block" value="Simpan">
				<?=form_close();?>
			</div>
		</div><?php
    }
}
require_once('static/footer.php');