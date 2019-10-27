<?php
require_once('static/header.php');
require_once('static/sidebar.php');
?>
  <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget bg-primary padding-0">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center pv-15 bg-light-dark">
                                <em class="fa fa-wifi fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-15 text-center">
                                <h2 class="mv-0"><?=$jml_supplier;?></h2>
                                <div class="text-uppercase"> Supplier</div>
                            </div>
                        </div>
                    </div><!--end widget-->
                </div><!--end col-->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget bg-teal padding-0">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center pv-15 bg-light-dark">
                                <em class="icon-bag fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-15 text-center">
                                <h2 class="mv-0"><?=$jml_customer;?></h2>
                                <div class="text-uppercase"> Customer</div>
                            </div>
                        </div>
                    </div><!--end widget-->
                </div><!--end col-->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget bg-success padding-0">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center pv-15 bg-light-dark">
                                <em class="icon-users fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-15 text-center">
                                <h2 class="mv-0"><?=$jml_barang;?></h2>
                                <div class="text-uppercase"> Barang</div>
                            </div>
                        </div>
                    </div><!--end widget-->
                </div><!--end col-->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget bg-indigo padding-0">
                        <div class="row row-table">
                            <div class="col-xs-4 text-center pv-15 bg-light-dark">
                                <em class="fa fa-users fa-3x"></em>
                            </div>
                            <div class="col-xs-8 pv-15 text-center">
                                <h2 class="mv-0"><?=$jml_users;?></h2>
                                <div class="text-uppercase">Users</div>
                            </div>
                        </div>
                    </div><!--end widget-->
                </div><!--end col--> <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Penjualan bulan ini <small class="text-muted">( <?=bulan();?> )</small>

                        </div>
                        <div class="panel-body">
                            <div>
                                <div id="stocked"></div>
                            </div>
                        </div>
                    </div>
                </div><!--col-md-12-->
                  <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" type="button" class="btn btn-info btn-rounded btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu panel-dropdown" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                            </div>
                            Data Analytics <small class="text-muted">Current Month</small>
                        </div>
                        <div class="panel-body">
                            <div>
                                <div id="pieChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
<?php
require_once('static/footer.php');