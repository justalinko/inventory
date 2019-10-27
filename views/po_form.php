<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Tambah Pre-Order</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open_multipart('purchasing/add_po');?>
				<label>No. PO</label>
				<input type="number" name="no_po" class="form-control"><br>
				<label>Supplier</label>
				<select class="form-control select2" name="supplier"><?php
				foreach($this->db->get('supplier')->result() as $customer)
				{
					echo "<option value='".$customer->id_supplier."'>".$customer->nama."</option>";
				}
				?>
			</select>
				<br><br>
				
				<label>Item</label>
				<input type="text" name="item" class="form-control"><br>
	
				<label>Tujuan</label>
				<textarea class="form-control" name="tujuan"></textarea><br>
				<label>Keterangan</label>
				<textarea class="form-control" name="keterangan"></textarea><br>
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