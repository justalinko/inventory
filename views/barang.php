<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('master/barang/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
<a href="<?=base_url('master/barang/import');?>" class="btn btn-warning"><i class="fa fa-upload"></i> Import</a>
<a href="<?=base_url('excel-export/barang');?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
<a href="<?=base_url('pdfx/barang');?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
<a href="<?=base_url('printx/barang');?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<?php
if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data barang</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM barang,supplier WHERE barang.id_supplier=supplier.id_supplier ORDER BY barang.id_barang DESC ");
			$this->table->set_heading('ID','Nama Supplier','Nama Barang','Kode','Satuan','Harga beli','Note','Action');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_barang,$x->nama,$x->nama_barang,$x->kode,$x->satuan,rupiah($x->harga_beli),$x->note_barang,action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_barang));
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
				<h3>Tambah barang</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open('master/add_barang');?>
				<label>Supplier </label>
				<select class="form-control select2" name="supplier">
					<?php
					$x = $this->db->get('supplier');
					foreach($x->result() as $d)
					{
						echo "<option value='".$d->id_supplier."'>".$d->nama."</option>";
					}
					?>
				</select><br>
				<br>
				<label>Kode</label>
				<input type="text" name="kode" class="form-control"><br>
				<label>Nama barang</label>
				<input type="text" name="barang" class="form-control"><br>
				<label>Satuan</label>
				<input type="text" name="satuan" class="form-control"><br>
				<label>Harga beli</label>
				<input type="number" name="harga" class="form-control"><br>
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
		$this->db->delete('barang',['id_barang'=>$id]);
		swalx('success','Berhasil !','Berhasil hapus barang!',base_url('master/barang'));
	}elseif($this->uri->segment(3) == 'edit')
    {
        $id = $this->uri->segment(4);
        $q = $this->db->get_where('barang',['id_barang' => $id]);
        $value = $q->row();
        ?>
<br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Edit barang</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open('master/edit_barang/'.$id);?>
				<label>Supplier </label>
				<select class="form-control select2" name="supplier">
					<?php
					$x = $this->db->get('supplier');
					foreach($x->result() as $d)
					{
                        if($value->id_supplier == $d->id_supplier)
                        {
                            echo "<option value='".$d->id_supplier."' selected>".$d->nama."</option>";
                        }else{
						echo "<option value='".$d->id_supplier."'>".$d->nama."</option>";
                        }
					}
					?>
				</select><br>
				<br>
				<label>Kode</label>
				<input type="text" name="kode" class="form-control" value="<?=$value->kode;?>"><br>
				<label>Nama barang</label>
				<input type="text" name="barang" class="form-control" value="<?=$value->nama_barang;?>"><br>
				<label>Satuan</label>
				<input type="text" name="satuan" class="form-control" value="<?=$value->satuan;?>"><br>
				<label>Harga beli</label>
				<input type="number" name="harga" class="form-control" value="<?=$value->harga_beli;?>"><br>
				<label>Note</label>
				<textarea class="form-control" name="note"><?=$value->note_barang;?></textarea><br>


				<input type="submit" name="submit" class="btn btn-primary btn-block" value="Simpan">
				<?=form_close();?>
			</div>
		</div>
<?php
    }
}
require_once('static/footer.php');