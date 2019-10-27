        <!--left navigation start-->
        <aside class="float-navigation light-navigation">
            <div class="nano">
                <div class="nano-content">
                    <ul class="metisMenu nav" id="menu">
                        <li class="nav-heading"><span>SISTEM DPoS</span></li>
                        <li>
                            <a href="<?=base_url('main');?>" aria-expanded="true"><i class="icon-home"></i> Dashboard </a>
                          
                        </li>
                    <li>
                            <a href="javascript: void(0);" aria-expanded="true"><i class="fa fa-database"></i> Data Master<span class="fa arrow"></span></a>
                            <ul class="nav-second-level nav" aria-expanded="true">
                                <li><a href="<?=base_url('master/supplier');?>">Supplier</a></li>
                                <li><a href="<?=base_url('master/customer');?>">Customer</a></li>
                                <li><a href="<?=base_url('master/barang');?>">Barang</a></li>

                            </ul>
                        </li>
                        <?php
                        if($this->dpos->userdata()->level == 'owner' || $this->dpos->userdata()->level == 'administrasi'): ?>
                        <li>
                            <a href="javascript: void(0);" aria-expanded="true"><i class="fa fa-users"></i>Administrasi<span class="fa arrow"></span></a>
                            <ul class="nav-second-level nav" aria-expanded="true">
                                <li><a href="<?=base_url('administrasi/surat-masuk');?>">Surat Masuk</a></li>
                                <li><a href="<?=base_url('administrasi/surat-keluar');?>">Surat Keluar</a></li>
                                <li><a href="<?=base_url('administrasi/rfq-masuk');?>">RFQ Masuk</a></li>
                                <li><a href="<?=base_url('administrasi/quotation');?>">Quotation</a></li>
                                 <li><a href="<?=base_url('administrasi/negotation');?>">Negotation</a>
                                <li><a href="<?=base_url('administrasi/purchase-order');?>">Purchase Order</a></li>
                                <li><a href="<?=base_url('administrasi/graphic');?>">Graphic</a>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if($this->dpos->userdata()->level == 'owner' || $this->dpos->userdata()->level == 'purchasing'): ?>
                         <li>
                            <a href="javascript: void(0);" aria-expanded="true"><i class="fa fa-dollar"></i>Purchasing<span class="fa arrow"></span></a>
                            <ul class="nav-second-level nav" aria-expanded="true">
                                <li><a href="<?=base_url('purchasing/rfq-form');?>">RFQ Form</a></li>
                                <li><a href="<?=base_url('purchasing/rfq-keluar');?>">RFQ Keluar</a></li>
                                <li><a href="<?=base_url('purchasing/po-form');?>">PO Form</a></li>
                                <li><a href="<?=base_url('purchasing/po-keluar');?>">PO Keluar</a></li>
                                <li><a href="<?=base_url('purchasing/quotation-supplier');?>">Quotation Supplier</a>
                            </ul>
                        </li>
                      <?php endif; ?>
                      <?php if($this->dpos->userdata()->level == 'owner' || $this->dpos->userdata()->level == 'accounting'): ?>
                         <li>
                            <a href="javascript: void(0);" aria-expanded="true"><i class="fa fa-key"></i>Accounting<span class="fa arrow"></span></a>
                            <ul class="nav-second-level nav" aria-expanded="true">
                                <li><a href="<?=base_url('accounting/penjualan');?>">Penjualan</a></li>
                                <li><a href="<?=base_url('accounting/pembelian');?>">Pembelian</a></li>
                                <li><a href="<?=base_url('accounting/operasional-adm');?>">Operasional & ADM</a></li>
                                <li><a href="<?=base_url('accounting/gaji-karyawan');?>">Gaji Karyawan</a></li>
                            </ul>
                        </li>
                    <?php endif ;?>
                    <?php if($this->dpos->userdata()->level == 'owner'): ?> 
                        <li>
                            <a href="javascript: void(0);" aria-expanded="true"><i class="fa fa-users"></i>Management Users<span class="fa arrow"></span></a>
                            <ul class="nav-second-level nav" aria-expanded="true">
                                <li><a href="<?=base_url('menej-users/add');?>">Tambah user</a></li>
                                <li><a href="<?=base_url('menej-users/all');?>">Semua user</a></li>
                            </ul>
                        </li>
                    <?php endif;?>
                     
                      
                    </ul>
                </div><!--nano content-->
            </div><!--nano scroll end-->
        </aside>
        <!--left navigation end-->


        <!--main content start-->
        <section class="main-content container">



            <!--page header start-->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                    <h5><?=date('D, d M Y');?> , Selamat datang <?=$this->session->nama_lengkap;?> !</h5>
                    </div>
                    <div class="col-sm-6 text-right">
                        <ol class="breadcrumb">
                            <li><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                            <li><?=@$this->uri->segment(1);?></li>
                            <li><?=str_replace("_"," ",@$this->uri->segment(2));?></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!--page header end-->


            <!--start page content-->