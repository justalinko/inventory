<?php

require_once('static/header.php');
require_once('static/sidebar.php');


if($this->uri->segment(2)  == 'profile'){
?>
<div class="panel panel-primary">
	<div class="panel panel-heading">
		<h3>Users profile</h3>
	</div>
	<div class="panel panel-body">
		<table class="table">
			<tr><td>Nama lengkap</td><td><?=$this->dpos->userdata()->nama_lengkap;?></td></tr>
			<tr><td>Username</td><td><?=$this->dpos->userdata()->username;?></td></tr>
			<tr><td>No. HP</td><td><?=$this->dpos->userdata()->hp;?></td></tr>
			<tr><td>Email</td><td><?=$this->dpos->userdata()->email;?></td></tr>
			<tr><td>Level</td><td><?=$this->dpos->userdata()->level;?></td></tr>
			<tr><td colspan=2><a href='<?=base_url('users/setting');?>' class='btn btn-warning btn-block'><i class='fa fa-pencil'></i> Edit profile</a></td></tr>
		</table>
	</div>
</div>
<?php
}elseif($this->uri->segment(2) == 'setting')
{
	echo form_open('users/save_setting');
	?>
	<div class="panel panel-primary">
	<div class="panel panel-heading">
		<h3>Users profile</h3>
	</div>
	<div class="panel panel-body">
		<table class="table">
			<tr><td>Nama lengkap</td><td><?=form_input(['type' => 'text' ,'class'=>'form-control','name' => 'nama' ,'value' =>$this->dpos->userdata()->nama_lengkap]);?></td></tr>
			<tr><td>Username</td><td><?=form_input(['type' => 'text', 'class' => 'form-control','name' => 'username' ,'value' => $this->dpos->userdata()->username]);?></td></tr>
			<tr><td>No. HP</td><td><?=form_input(['type' => 'text', 'class' => 'form-control','name' => 'hp' ,'value' => $this->dpos->userdata()->hp]);?></td></tr>
			<tr><td>Email</td><td><?=form_input(['type' => 'text', 'class' => 'form-control','name' =>'email' ,'value' => $this->dpos->userdata()->email]);?></td></tr>
			<tr><td>Password lama</td><td><?=form_input(['type' => 'password', 'class' => 'form-control','name'=> 'pass_lama' ]);?></td></tr>
						<tr><td>Password baru</td><td><?=form_input(['type' => 'password', 'class' => 'form-control','name'=> 'pass_baru' ]);?></td></tr>
			<tr><td colspan=2><input type="submit" name="save" class="btn btn-primary btn-block" value="Simpan"></td></tr>
		</table>
	</div>
</div>
<?php
echo form_close();
}
require_once('static/footer.php');