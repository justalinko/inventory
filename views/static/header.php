<?php
if($this->session->userdata('logged_in')){
$userdata = $this->dpos->fetch_users($this->session->userdata('username'),$this->session->userdata('password'));
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>GriyaRotan - <?=$subtitle;?></title>
        <link rel="icon" type="text/css" href="<?=base_url('/assets/images/hijaiyh-logo.png');?>">
        <!-- Common plugins -->
        <link href="<?=base_url();?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=base_url();?>/assets/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet">
        <link href="<?=base_url();?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?=base_url();?>/assets/plugins/pace/pace.css" rel="stylesheet">
        <link href="<?=base_url();?>/assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url();?>/assets/plugins/nano-scroll/nanoscroller.css">
        <link rel="stylesheet" href="<?=base_url();?>/assets/plugins/metisMenu/metisMenu.min.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/plugins/wysihtml5/bootstrap-wysihtml5.css" >
        <!--template css-->
        <link href="<?=base_url();?>/assets/css/style.css" rel="stylesheet">
        <link href="<?=base_url();?>/assets/plugins/iCheck/blue.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
    function printDiv(divName) {
        var w = window.open();
        w.document.write(document.getElementById(divName).innerHTML);
      /*  w.print();
        w.close();*/
    }

          
        </script>
    </head>
    <body>

   <!--top bar start-->
        <div class="top-bar light-top-bar"><!--by default top bar is dark, add .light-top-bar class to make it light-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="<?=base_url();?>" class="admin-logo">
                            <h1 style="color:#333">{GR}</h1>
                        </a>
                        <div class="left-nav-toggle visible-xs visible-sm">
                            <a href="">
                                <i class="glyphicon glyphicon-menu-hamburger"></i>
                            </a>
                        </div><!--end nav toggle icon-->
                        
                    </div>
                    <div class="col-xs-6">
                        <ul class="list-inline top-right-nav">
                           
                           
                           
                            <li class="dropdown avtar-dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?=base_url();?>assets/images/avtar-1.jpg" class="img-circle" width="30" alt="">

                                </a>
                                <ul class="dropdown-menu top-dropdown">
                                   
                                    <li><a href="<?=base_url('users/profile');?>"><i class="icon-user"></i> Profile</a></li>
                                    <li><a href="<?=base_url('users/setting');?>"><i class="icon-settings"></i> Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?=base_url('users/logout');?>"><i class="icon-logout"></i> Logout</a></li>
                                </ul>
                            </li>

                        </ul> 
                    </div>
                </div>
            </div>
        </div>
        <!-- top bar end-->
