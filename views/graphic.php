<?php

require_once('static/header.php');
require_once('static/sidebar.php');

?>
<div class="row">
                <div class="col-md-12">
                  
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Graphic PO
                        </div>
                        <div class="panel-body">
                            <div>
                                <canvas id="pograp" height="100"></canvas>
                            </div>
                        </div>
                    </div>

                </div><!--col-md-12-->
                  <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Graphic RFQ
                        </div>
                        <div class="panel-body">
                            <div>
                                <canvas id="rfqgrap" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                  <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            Graphic Quotation
                        </div>
                        <div class="panel-body">
                            <div>
                                <canvas id="quograp" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
require_once('static/footer.php');