<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('master/customer/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
<a href="<?=base_url('master/customer/import');?>" class="btn btn-warning"><i class="fa fa-upload"></i> Import</a>
<a href="<?=base_url('excel-export/customer');?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
<a href="<?=base_url('pdfx/customer');?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
<a href="<?=base_url('printx/customer');?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<?php
if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data customer</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM customer ORDER BY id_customer DESC ");
			$this->table->set_heading('ID','Nama customer','User','Divisi','Telphone','HP','Email','Website','Note','Action');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_customer,$x->nama_lengkap,$x->username,$x->divisi,$x->phone,$x->hp,$x->email,$x->website,$x->note,action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_customer));
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
				<h3>Tambah customer</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open('master/add_customer');?>
				<label>Nama</label>
				<input type="text" name="nama" class="form-control"><br>
				<label>User</label>
				<input type="text" name="username" class="form-control"><br>
				<label>Divisi</label>
				<input type="text" name="divisi" class="form-control"><br>
				<label>Phone</label>
				<input type="tel" name="phone" class="form-control"><br>
				<label>HP</label>
				<input type="tel" name="hp" class="form-control"><br>
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
		$this->db->delete('customer',['id_customer'=>$id]);
		swalx('success','Berhasil !','Berhasil hapus customer!',base_url('master/customer'));
	}elseif($this->uri->segment(3) == 'edit')
    {
        $id = $this->uri->segment(4);
        $p = $this->db->get_where('customer',['id_customer' => $this->uri->segment(4)]);
        $value = $p->row();
        ?>
<br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Edit customer</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open('master/edit_customer/'.$id);?>
				<label>Nama</label>
				<input type="text" name="nama" class="form-control"  value="<?=$value->nama_lengkap;?>"><br>
				<label>User</label>
				<input type="text" name="username" class="form-control" value="<?=$value->username;?>"><br>
				<label>Divisi</label>
				<input type="text" name="divisi" class="form-control" value="<?=$value->divisi;?>"><br>
				<label>Phone</label>
				<input type="tel" name="phone" class="form-control" value="<?=$value->phone;?>"><br>
				<label>HP</label>
				<input type="tel" name="hp" class="form-control" value="<?=$value->hp;?>"><br>
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="<?=$value->email;?>"><br>
						<label>Website</label>
				<input type="text" name="website" class="form-control" value="<?=$value->website;?>"><br>
				<label>Note</label>
				<textarea class="form-control" name="note"><?=$value->note;?></textarea><br>


				<input type="submit" name="submit" class="btn btn-primary btn-block" value="Simpan">
				<?=form_close();?>
			</div>
		</div>
<?php
    }
}
require_once('static/footer.php');