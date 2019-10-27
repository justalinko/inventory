<?php

require_once('static/header.php');
require_once('static/sidebar.php');
?>
<br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data PO Keluar</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM preorder,supplier WHERE preorder.id_supplier=supplier.id_supplier  ORDER BY id_po DESC ");
			$this->table->set_heading('No','Tanggal','No. PO','Supplier','Item','Tujuan','Keterangan','Lampiran','Action');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_po,$x->tanggal,$x->no_po,$x->nama,$x->item,$x->tujuan,$x->keterangan,"<a href='".base_url('uploads/'.$x->lampiran)."' target='_blank'>".$x->lampiran."</a>",action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_po));
			}
			echo $this->table->generate();
			?>
		</div>
		</div>
	</div> 
	<?php
	require_once('static/footer.php');