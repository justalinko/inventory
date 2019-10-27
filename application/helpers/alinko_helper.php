<?php
function action_button($segment=[],$id)
{
	$uris = base_url()."".$segment[0]."/".$segment[1]."/edit/".$id;
	$uris2 = base_url()."".$segment[0]."/".$segment[1]."/delete/".$id;
	$h = "<a href='$uris2' class='btn btn-danger' onclick=\"return confirm('apakah anda yakin?');\"><i class='fa fa-trash'></i></a>&nbsp;&nbsp;";
    $h.= "<a href='$uris' class='btn btn-warning' ><i class='fa fa-pencil'></i></a>";
	return $h;
}

function swalx($type,$title,$text,$redirek)
{
	?>
		<link href="<?=base_url();?>assets/plugins/bootstrap-sweet-alerts/sweet-alert.css" rel="stylesheet">
 <script src="<?=base_url();?>assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url();?>assets/plugins/bootstrap-sweet-alerts/sweet-alert.min.js"></script>
		
		<script type="text/javascript">
			     //Auto Close Timer
			     setTimeout(function(){               
                    swal({
                    	type : "<?=$type;?>",
                        title: "<?=$title;?>",
                        text: "<?=$text;?>",
                        timer: 2000,
                        showConfirmButton: false
                    });

                }
                ,10);
			     setTimeout(function(){

			     window.location.href='<?=$redirek;?>';
			 },2010);

		</script>
		<?php
}

function rupiah($number)
{
	$rp= "Rp. ";
	$rp.= str_replace(",",".",number_format($number));

	return $rp;

}
function bulan($num = null)
{$bulan = date('m');
	if($num == null)
	{
		switch ($bulan) {
			case '01':
				$m = "Januari";
				break;
			case '02':
				$m = "Februari";
				break;
			case '03':
				$m = "Maret";
				break;
			case '04':
				$m = "April";
				break;
			case '05':
				$m = "Mei";
				break;
			case '06':
				$m = "Juni";
				break;
			case '07':
				$m = "Juli";
				break;
			case '08':
				$m = "Agustus";
				break;
			case '09':
				$m = "September";
				break;
			case '10':
				$m = "Oktober";
				break;
			case '11':
				$m = "November";
				break;
			case '12':
				$m = "Desember";
				break;
			}
		}else{
			switch ($num) {
			case '01':
				$m = "Januari";
				break;
			case '02':
				$m = "Februari";
				break;
			case '03':
				$m = "Maret";
				break;
			case '04':
				$m = "April";
				break;
			case '05':
				$m = "Mei";
				break;
			case '06':
				$m = "Juni";
				break;
			case '07':
				$m = "Juli";
				break;
			case '08':
				$m = "Agustus";
				break;
			case '09':
				$m = "September";
				break;
			case '10':
				$m = "Oktober";
				break;
			case '11':
				$m = "November";
				break;
			case '12':
				$m = "Desember";
				break;
		}
	}

		return $m;
	}

	function getBulanDB($str)
	{
		$s = substr($str,7,2);

		return $s;
	}

?>