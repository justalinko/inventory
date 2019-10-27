<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('administrasi/negotation/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
<a href="<?=base_url('administrasi/negotation/import');?>" class="btn btn-warning"><i class="fa fa-upload"></i> Import</a>
<a href="<?=base_url('#');?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
<a href="<?=base_url('pdfx/negotation');?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a>
<a href="<?=base_url('printx/negotation');?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<?php
if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data negotation</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM negotation,quotation,rfq WHERE negotation.id_quotation=quotation.id_quotation AND rfq.id_rfq=negotation.id_rfq ORDER BY negotation.id_negotation DESC ");
			$this->table->set_heading('No.','Tanggal','Deskripsi','No. RFQ','No. Quo','Price','Nego price','Note','Lampiran','Action');$no=1;
			foreach($q->result() as $x){
			$this->table->add_row($no++,$x->tanggal,$x->deskripsi,$x->no_rfq,$x->no_quotation,$x->price,$x->nego_price,$x->nego_note,"<a href='".base_url('uploads/'.$x->lampiran)."' target='_blank'>".$x->lampiran."</a>",action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_negotation));
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
				<h3>Tambah negotation</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('administrasi/add_negotation');?>
				<label>No. Quo</label>
				<select class="form-control select2" name="no_quo">
					<?php
					$c=$this->db->get('quotation');
					foreach($c->result() as $p)
					{
						echo "<option value='".$p->id_quotation."'>".$p->no_quotation."</option>";
					}
					?>
				</select>
				<br>
				<br>
				<label>No. RFQ</label>
				<select class="form-control select2" name="no_rfq">
					<?php
					$c=$this->db->get('rfq');
					foreach($c->result() as $p)
					{
						echo "<option value='".$p->id_rfq."'>".$p->no_rfq."</option>";
					}
					?>
				</select>
				<br>
				<br>
				<label>Nego price</label>
				<input type="text" name="nego_price" class="form-control"><br>
				
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
		$this->db->delete('negotation',['id_negotation'=>$id]);
		swalx('success','Berhasil !','Berhasil hapus negotation!',base_url('administrasi/negotation'));
	}elseif($this->uri->segment(3) == 'edit')
    {
        $id = $this->uri->segment(4);
        $q = $this->db->get_where('negotation',['id_negotation' => $id]);
        $value = $q->row();
        ?>
        <br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Edit negotation</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('administrasi/edit_negotation/'.$id);?>
				<label>No. Quo</label>
				<select class="form-control select2" name="no_quo">
					<?php
					$c=$this->db->get('quotation');
					foreach($c->result() as $p)
					{
                        if($value->id_quotation == $p->id_quotation){
						echo "<option value='".$p->id_quotation."' selected>".$p->no_quotation."</option>";
                        }else{
                            echo "<option value='".$p->id_quotation."' >".$p->no_quotation."</option>";
                        }
					}
					?>
				</select>
				<br>
				<br>
				<label>No. RFQ</label>
				<select class="form-control select2" name="no_rfq" v>
					<?php
					$c=$this->db->get('rfq');
					foreach($c->result() as $p)
					{
                        if($value->id_rfq == $p->id_rfq){
						echo "<option value='".$p->id_rfq."' selected>".$p->no_rfq."</option>";
                        }else{
                            echo "<option value='".$p->id_rfq."'>".$p->no_rfq."</option>";
                        }
					}
					?>
				</select>
				<br>
				<br>
				<label>Nego price</label>
				<input type="text" name="nego_price" class="form-control" value="<?=$value->nego_price;?>"><br>
				
				<label>Note</label>
				<textarea class="form-control" name="note"><?=$value->nego_note;?></textarea><br>
				<label>Lampiran</label>
				<input type="file" name="lampiran" class="form-control"><br>
				<input type="submit" name="submit" class="btn btn-primary btn-block" value="Simpan">
				<?=form_close();?>
			</div>
		</div>
<?php
    }
}
require_once('static/footer.php');