<?php

Class Dpos extends CI_Model{
    
    public function auth_signin($user,$pass)
    {
        $pass = sha1($pass);
        $quer = $this->db->get_where('users',['username' => $user,'password'=> $pass]);
        if($quer->num_rows() > 0 )
        {
            $f = $quer->row();
            
            $data = ['id_users' => $f->id_users,
                     'username' => $f->username,
                    'password' => $f->password,
                    'email' => $f->email,
                     'level' => $f->level,
                     'nama_lengkap'=>$f->nama_lengkap,
                     'hp' => $f->hp,
                     'logged_in' => $_SERVER['REMOTE_ADDR']
                     ];
            $this->session->set_userdata($data);
            
            return true;
        }else{
            return false;
        }
    }
    public function fetch_users($user ,$pass)
{
	
	$queri = $this->db->get_where('users',['username' => $user,'password' => $pass]);
	return $queri->row();
	//exit(print_r($x));exit
}
public function user_level()
{
	$user = $this->session->userdata('username');
	$pass = $this->session->userdata('password');
	$queri = $this->db->get_where('users',['username' => $user,'password' => $pass]);
	$x = $queri->row();

	return $x->level;

}
public function userdata()
{
	$user = $this->session->userdata('username');
	$pass = $this->session->userdata('password');
	$queri = $this->db->get_where('users',['username' => $user,'password' => $pass]);
	$x = $queri->row();

	return $x;

}

function table()
{
    $template = array(
        'table_open'            => '<table class="table table-hover table-striped" id="datatable">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);

return $this->table->set_template($template);

}
function table_print()
{
    $template = array(
        'table_open'            => '<table border="1" style="border-collapse:collapse;">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);

return $this->table->set_template($template);

}
public function jumlahno($from,$bulan)
{
    $hitung = [];
    $q = $this->db->get($from);
    if($q->num_rows() > 0)
    {
        foreach($q->result() as $row)
        {
            $month = substr($row->tanggal,7,2);
            if("$bulan" == "$month"){
            array_push($hitung,$month); 
            }
        }

    }
 
    return count($hitung);
}
}