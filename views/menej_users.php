<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<a href="<?=base_url('menej-users/add');?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>

<?php

    if($this->uri->segment(2) == 'add'){
		?><br><br>
		<div class="panel panel-primary">
			<div class="panel panel-heading">
				<h3>Tambah users</h3>
			</div>
			<div class="panel panel-body">
				<?=form_open('menej-users/add_users');?>
				<label>Nama lengkap</label>
				<input type="text" name="nama" class="form-control"><br>
				<label>Username</label>
				<input type="text" name="username" class="form-control"><br>
				<label>Password</label>
				<input type="text" name="password" class="form-control"><br>
				<label>Hp</label>
				<input type="tel" name="hp" class="form-control"><br>
				<label>Email</label>
				<input type="email" name="email" class="form-control"><br>
				<label>Level</label>
			    <select name="level" class="form-control select2">
			        <option value="administrasi">Administrasi</option>
			        <option value="purchasing">Purchasing</option>
			        <option value="accounting">Accounting</option>
			        <option value="owner">Owner</option>
			    </select>
				<br><br>


				<input type="submit" name="submit" class="btn btn-primary btn-block" value="Tambah">
				<?=form_close();?>
			</div>
		</div>
		<?php

}elseif($this->uri->segment(2) == 'all')
{
	?>
	<br><br>
	<div class="panel panel-success">
		<div class="panel panel-heading">
			<h3>Data users</h3>
		</div>
		<div class="panel panel-body">
			<div class="table-responsive">
			<?php
			$this->dpos->table();
			$q = $this->db->query("SELECT * FROM users ORDER BY id_users DESC ");
			$this->table->set_heading('ID','Nama lengkap','Username','HP','Email','Level','Action');
			foreach($q->result() as $x){
			$this->table->add_row($x->id_users,$x->nama_lengkap,$x->username,$x->hp,$x->email,"<b>".$x->level."</b>",action_button([$this->uri->segment(1),$this->uri->segment(2)],$x->id_users));
			}
			echo $this->table->generate();
			?>
		</div>
		</div>
	</div> 
	<?php
}


if($this->uri->segment(3) == 'delete')
{
	$this->db->delete('users',['id_users' => $this->uri->segment(4)]);

	swalx('success','Berhasil!','Berhasil hapus data',base_url('menej-users/all'));
}


require_once('static/footer.php');