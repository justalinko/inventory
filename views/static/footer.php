<?php

function isiData($from,$darimana)
{
    $r= "[";
    for($i=1;$i<=12;$i++)
    {
        $num = str_pad($i, 2,"0",STR_PAD_LEFT);
        if($i!=12)
        {
            $r .= $darimana->jumlahno($from,$num).",";
        }else{
            $r .= $darimana->jumlahno($from,$num);
        }
    }
    $r.= "]";

    return $r;
}
       $penjualan = $this->dpos->jumlahno('penjualan',date('m'));
        $pembelian = $this->dpos->jumlahno('pembelian',date('m'));

?>


            <!--end page content-->


            <!--Start footer-->
            <footer class="footer">
                <span><a href='https://justalinko.com' target='_blank'>Copyright &copy;  <b>GriyaRotan 2019</b>   </a> </span>
            </footer>
            <!--end footer-->

        </section>
        <!--end main content-->


        <!--Common plugins-->
        <script src="<?=base_url();?>/assets/plugins/jquery/dist/jquery.min.js"></script>
        <script src="<?=base_url();?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url();?>/assets/plugins/pace/pace.min.js"></script>
        <script src="<?=base_url();?>/assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
        <script src="<?=base_url();?>/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?=base_url();?>/assets/plugins/nano-scroll/jquery.nanoscroller.min.js"></script>
        <script src="<?=base_url();?>/assets/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="<?=base_url();?>/assets/js/float-custom.js"></script>

     <script src="<?=base_url();?>/assets/plugins/chartJs/Chart.min.js"></script>
     <!--    <script src="<?=base_url();?>/assets/js/chartJs.custom.js"></script> -->
     <script type="text/javascript">
          /**
     * Options for Single Bar chart
     */
    var singleBarOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.00)",
        scaleGridLineWidth: 1,
        barShowStroke: false,
        barStrokeWidth: 1,
        barValueSpacing: 6,
        barDatasetSpacing: 1,
        responsive: true
    };

    /**
     * Data for Bar chart
     */
    var singleBarData = {
        labels: ['<?=bulan(1);?>',
                '<?=bulan(2);?>',
                '<?=bulan(3);?>',
                '<?=bulan(4);?>',
                '<?=bulan(5);?>',
                '<?=bulan(6);?>',
                '<?=bulan(7);?>',
                '<?=bulan(8);?>',
                '<?=bulan(9);?>',
                '<?=bulan(10);?>',
                '<?=bulan(11);?>',
                '<?=bulan(12);?>'],
        datasets: [
            {
                label: "My Second dataset",
                fillColor: "#ff3838",
                strokeColor: "#ff3838",
                highlightFill: "#f00",
                highlightStroke: "#f00",
                data: <?=isiData('preorder',$this->dpos);?>
            }
        ]
    };

    var ctx = document.getElementById("pograp").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(singleBarData, singleBarOptions);

    //rfq

        /**
     * Options for Single Bar chart
     */
    var singleBarOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.00)",
        scaleGridLineWidth: 1,
        barShowStroke: false,
        barStrokeWidth: 1,
        barValueSpacing: 6,
        barDatasetSpacing: 1,
        responsive: true
    };

    /**
     * Data for Bar chart
     */
    var singleBarData = {
        labels: ['<?=bulan(1);?>',
                '<?=bulan(2);?>',
                '<?=bulan(3);?>',
                '<?=bulan(4);?>',
                '<?=bulan(5);?>',
                '<?=bulan(6);?>',
                '<?=bulan(7);?>',
                '<?=bulan(8);?>',
                '<?=bulan(9);?>',
                '<?=bulan(10);?>',
                '<?=bulan(11);?>',
                '<?=bulan(12);?>'],
        datasets: [
            {
                label: "My Second dataset",
                fillColor: "#ffcc00",
                strokeColor: "#ffcc00",
                highlightFill: "#bc9600",
                highlightStroke: "#bc9600",
                data: <?=isiData('rfq',$this->dpos);?>
            }
        ]
    };

    var ctx = document.getElementById("rfqgrap").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(singleBarData, singleBarOptions);

      /**
     * Data for Bar chart
     */
    var singleBarData = {
        labels: ['<?=bulan(1);?>',
                '<?=bulan(2);?>',
                '<?=bulan(3);?>',
                '<?=bulan(4);?>',
                '<?=bulan(5);?>',
                '<?=bulan(6);?>',
                '<?=bulan(7);?>',
                '<?=bulan(8);?>',
                '<?=bulan(9);?>',
                '<?=bulan(10);?>',
                '<?=bulan(11);?>',
                '<?=bulan(12);?>'],
        datasets: [
            {
                label: "My Second dataset",
                fillColor: "#075b02",
                strokeColor: "#075b02",
                highlightFill: "#09bf00",
                highlightStroke: "#09bf00",
                data: <?=isiData('quotation',$this->dpos);?>
            }
        ]
    };

    var ctx = document.getElementById("quograp").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(singleBarData, singleBarOptions);
     </script>
 <script src="<?=base_url();?>/assets/plugins/chart-c3/d3.min.js"></script>
        <script src="<?=base_url();?>/assets/plugins/chart-c3/c3.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
    //


        //page view chart
        c3.generate({
            bindto: '#stocked',
            data: {
                columns: [
                    ['Penjualan', 130, 200, 100, 140, 150, 250],
                    ['Pembelian', 50, 90, 80, 40, 55, 89]
                ],
                colors: {
                    Penjualan: '#23b7e5',
                    Pembelian: '#0043ff'
                },
                type: 'bar'
            }
        });
        /*time series*/
        var chart = c3.generate({
            bindto: '#timeseriesChart',
            data: {
                x: 'x',
                xFormat: '%Y%m%d', // 'xFormat' can be used as custom format of 'x'
                columns: [
                    ['x', '2016-09-01', '2016-09-02', '2016-09-03', '2016-09-04', '2013-01-05', '2016-09-06'],
                    ['x', '20130101', '20130102', '20130103', '20130104', '20130105', '20130106'],
                    ['data1', 30, 200, 100, 400, 150, 250],
                    ['data2', 130, 340, 200, 500, 250, 350]
                ],
                colors: {
                    data1: '#23b7e5',
                    data2: '#BABABA',
                    data3: '#26A69A'
                }
            },
            axis: {
                x: {
                    type: 'timeseries',
                    tick: {
                        format: '%Y-%m-%d'
                    }
                }
            }
        });

        setTimeout(function () {
            chart.load({
                columns: [
                    ['data3', 400, 500, 450, 700, 600, 500]
                ]
            });
        }, 1000);
        //pie chart

        c3.generate({
            bindto: '#pieChart',
            data: {
                columns: [
                    ['Penjualan',<?=$penjualan;?>],
                    ['Pembelian',<?=$pembelian;?>]
                ],
                colors: {
                    Remains: '#F44336',
                    Used: '#50cdf4'
                },
                type: 'pie'
            }
        });
    });
        </script>
          <script src="<?=base_url();?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url();?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?=base_url();?>/assets/plugins/toast/jquery.toast.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/plugins/select2/dist/css/select2.min.css">
        <script type="text/javascript" src="<?=base_url();?>/assets/plugins/select2/dist/js/select2.min.js"></script>


     
      <script src="<?=base_url();?>/assets/plugins/wysihtml5/wysihtml5-0.3.0.js"></script>
        <script src="<?=base_url();?>/assets/plugins/wysihtml5/bootstrap-wysihtml5.js"></script>

          <!-- iCheck for radio and checkboxes -->
        <script src="<?=base_url();?>/assets/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue'
                });
            });
        </script>
      <script type="text/javascript">
        $(document).ready(function()
        {
            $('#texteditor').wysihtml5();
            $('#texteditor1').wysihtml5();

        })
      </script>
        <script>
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable1').dataTable();
                $('#datatable2').dataTable();

                $('.select2').select2();

            });
        </script>
       
    </body>
</html>