<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('administrasi/purchase-order/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
<a href="<?=base_url('administrasi/purchase-order/import');?>" class="btn btn-warning"><i class="fa fa-upload"></i> Import</a>
<a href="<?=base_url('excel-export/purchase-order');?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
<a href="<?=base_url('pdfx/purchase-order');?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
<a href="<?=base_url('printx/purchase-order');?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<?php
if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data Purchase Order</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM purchase_order,customer WHERE purchase_order.id_customer=customer.id_customer ORDER BY purchase_order.id_purchase DESC ");
			$this->table->set_heading('No.','Tanggal','Customer','Deskripsi','Deadline','Note','lampiran','Action');$no=1;
			foreach($q->result() as $x){
			$this->table->add_row($no++,$x->tanggal,$x->nama_lengkap,$x->deskripsi,$x->deadline,$x->note,"<a href='".base_url('uploads/'.$x->lampiran_order)."' target='_blank'>".$x->lampiran_order."</a>",action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_purchase));
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
				<h3>Tambah Purchase order</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('administrasi/add_po');?>
				<label>Deadline </label>
				<input type="text" name="deadline" class="form-control" ><br>
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
		$this->db->delete('purchase_order',['id_purchase'=>$id]);
		swalx('success','Berhasil !','Berhasil hapus Purchase order!',base_url('administrasi/purchase-order'));
	}elseif($this->uri->segment(3) == 'edit')
	{
		$id = $this->uri->segment(4);
		$q = $this->db->get_where('purchase_order',['id_purchase' => $id]);
		$value = $q->row();

		?>
<br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Edit Purchase order</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('administrasi/edit_po/'.$id);?>
				<label>Deadline </label>
				<input type="text" name="deadline" class="form-control"   value="<?=$value->deadline;?>"><br>
				<label>Customer</label>
				<select class="form-control select2" name="customer" >
					<?php
					$x = $this->db->get('customer');
					foreach($x->result() as $d)
					{
						if($value->id_customer == $d->id_customer){
						echo "<option value='".$d->id_customer."' selected>".$d->nama_lengkap."</option>";
						}else{
						echo "<option value='".$d->id_customer."' >".$d->nama_lengkap."</option>";

						}
					}
					?>
				</select><br>
				<br>
			

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