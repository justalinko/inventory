<?php

require_once('static/header.php');
require_once('static/sidebar.php');


if(empty($this->uri->segment(3)))
{
	?><br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data RFQ Masuk</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM rfq WHERE jenis='masuk' ORDER BY id_rfq DESC ");
			$this->table->set_heading('No','Tanggal','No. Rfq','Deskripsi','Budget','Deadline','Lampiran','Note','Action');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_rfq,$x->tanggal,$x->no_rfq,$x->deskripsi,$x->budget,$x->deadline,"<a href='".base_url('uploads/'.$x->lampiran)."' target='_blank'>".$x->lampiran."</a>",$x->note,action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_rfq));
			}
			echo $this->table->generate();
			?>
		</div>
		</div>
	</div> 
	<?php
}else
{
	
	if($this->uri->segment(3) == 'delete')
	{
		$id = $this->uri->segment(4);
		$this->db->delete('rfq',['id_rfq'=>$id]);
		swalx('success','Berhasil !','Berhasil hapus Rfq Masuk!',base_url('master/rfq-masuk'));
	}elseif($this->uri->segment(3) == 'edit')
    {
        $id = $this->uri->segment(4);
        $q = $this->db->get_where('rfq',['id_rfq' => $id]);
        $value = $q->row();
        ?>
<br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Edit RFQ</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('administrasi/edit_rfq/'.$id);?>
				<label>No.Rfq</label>
				<input type="number" name="no_rfq" class="form-control" value="<?=$value->no_rfq;?>"><br>
				<label>Customer</label>
				<select class="form-control select2" name="customer"><?php
				foreach($this->db->get('customer')->result() as $customer)
				{if($value->id_customer == $customer->id_customer)
                {
					echo "<option value='".$customer->id_customer."' selected>".$customer->nama_lengkap."</option>";
                }else{
                    echo "<option value='".$customer->id_customer."' >".$customer->nama_lengkap."</option>";
                }
				}
				?>
			</select>
				<br><br>
				<label>Jenis</label>
				<select class="form-control" name="jenis">
					<option value="keluar">Keluar</option>
					<option value="masuk" selected>Masuk</option>
				</select><br>
				<label>Budget</label>
				<input type="text" name="budget" class="form-control" value="<?=$value->budget;?>"><br>
				<label>Deadline</label>
				<input type="text" name="deadline" class="form-control" value="<?=$value->deadline;?>"><br>
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