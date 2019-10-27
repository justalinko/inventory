<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Tambah RFQ</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('purchasing/add_rfq');?>
				<label>No.Rfq</label>
				<input type="number" name="no_rfq" class="form-control"><br>
				<label>Customer</label>
				<select class="form-control select2" name="customer"><?php
				foreach($this->db->get('customer')->result() as $customer)
				{
					echo "<option value='".$customer->id_customer."'>".$customer->nama_lengkap."</option>";
				}
				?>
			</select>
				<br><br>
				<label>Jenis</label>
				<select class="form-control" name="jenis">
					<option value="keluar">Keluar</option>
					<option value="masuk">Masuk</option>
				</select><br>
				<label>Budget</label>
				<input type="text" name="budget" class="form-control"><br>
				<label>Deadline</label>
				<input type="text" name="deadline" class="form-control"><br>
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

require_once('static/footer.php');
//require_once('static/sidebar.php');

?>