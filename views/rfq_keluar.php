<?php

require_once('static/header.php');
require_once('static/sidebar.php');
?>
<br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data RFQ Keluar</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM rfq WHERE jenis='keluar' ORDER BY id_rfq DESC ");
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
	require_once('static/footer.php');