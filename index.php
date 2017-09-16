<?php
include_once "php/connection.php";
 include_once "php/checkauthentication.php";
?>
<!DOCTYPE html>
<html>

<?php
$pageTitle = 'PICAB Team';
include_once "layout/header.php";
?>
<body class="animated fadeIn">
<div id="wrapper">
    <?php
    include_once "layout/menu.php";
    ?>
    <div id="page-wrapper" class="gray-bg">
        <?php
        include_once "layout/topbar.php";
        ?>
<!--        --><?php //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; ?>
        <div class="row wrapper border-bottom white-bg page-heading animated fadeInLeftBig">
            <div class="col-sm-4">
                <h2><p>Dashboard</p></h2>
            </div>
        </div>
        <div class="wrapper wrapper-content animated bounceInDown">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>This chart shows the count of items per prosecution</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div id="lineChart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper wrapper-content animated bounceInUp">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>This chart shows the count of items in storage per prosecution</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div id="lineChart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div>
                <strong>Copyright</strong> We.Code &copy; 2017
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- d3 and c3 charts -->
<script src="js/plugins/d3/d3.min.js"></script>
<script src="js/plugins/c3/c3.min.js"></script>

<!-- Select2 -->
<script src="js/plugins/select2/select2.full.min.js"></script>

<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>

<!-- Toastr -->
<script src="js/plugins/toastr/toastr.min.js"></script>


<script src="js/plugins/dataTables/datatables.min.js"></script>
<script>
    function format(value) {
        return '<div class="middle wrap col-sm-12"  >' + value + '</div>';
    }
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            columnDefs: [{
                className: 'control',
                orderable: false,
                targets: 1
            }],
            columnDefs: [{
                targets: 0,
                visible: false
            }],
            order: [2, 'asc']

        });

    });
</script>
<script>
    $(document).ready(function() {
        <?php
        if (isset($_GET['backresult'])){
        $backresult=$_GET['backresult'];
        ?>
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.
            <?php
            if ($backresult ==  "1"){
                echo"success('تمت العملية بنجاح')";
            }else{
                echo "error('برجاء إعادة المحاولة', 'لم تتم العملية بنجاح')";
            }
            };?>;

        }, 1300);

    });
</script>

<script>
    $(document).ready(function() {
        var table = $('.dataTables-example').DataTable();
        // Add event listener for opening and closing details
        $('#example').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(tr.data('child-value'))).show();
                tr.addClass('shown');
            }
        });
    });
    $(document).ready(function() {
        $('.chosen-select').chosen({width: "100%"});
        $(".category").select2({
            placeholder: "Select a category",
            allowClear: true
        });
        $(".storepros").select2({
            placeholder: "Select a prosecution",
            allowClear: true
        });
        // Setup - add a text input to each footer cell
        $('#example tfoot th').not(":eq(0)").each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" />');
        });
        // DataTable
        var table = $('#example').DataTable();
        // Apply the search
        table.columns().every(function() {
            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    });

</script>
<script>
    $(document).ready(function () {
        c3.generate({
            bindto: '#lineChart',
            size: {
                height: '100%',
            },
            data: {
                x : 'x',
                columns: [
                    ['x', 'منشية', 'باب شرقي', 'إستئناف'],
                    ['case',  10, 18, 24],
                    ['printer', 5, 9, 13],
                    ['ups', 4, 2, 3],
                ],
            },
            axis: {
                x: {
                    type: 'category',
                    tick: {
                        rotate: 0,
                        size: 15,
                        multiline: false,
                    },
                }
            }
        });
    });
</script>
<?php

$result = mysqli_query($con, "Select category.categoryid,
  category.categoryname
From hardware
  Inner Join prosecution On prosecution.prosecutionid = hardware.prosecutionid
  Inner Join category On category.categoryid = hardware.categoryid
  Left Join user_has_hardware On user_has_hardware.hardwareid =
    hardware.hardwareid
Where (user_has_hardware.hardwareid Is Null Or user_has_hardware.status = 0)
Group By category.categoryid") or die(mysqli_error($con));

$result2 = mysqli_query($con, "Select prosecution.prosecutionid,
  prosecution.prosecutionname
From hardware
  Inner Join prosecution On prosecution.prosecutionid = hardware.prosecutionid
  Inner Join category On category.categoryid = hardware.categoryid
  Left Join user_has_hardware On user_has_hardware.hardwareid =
    hardware.hardwareid
Where (user_has_hardware.hardwareid Is Null Or user_has_hardware.status = 0)
Group By prosecution.prosecutionid") or die(mysqli_error($con));

$ids = array();
$names = array();
while($row = mysqli_fetch_assoc($result)){
    $ids[] = $row["categoryid"];
    $names[] = $row["categoryname"];
}
$ids2 = array();
while($row2 = mysqli_fetch_assoc($result2)){
    $ids2[] = $row2["prosecutionid"];
    $names2[] = $row2["prosecutionname"];
}
$prosecutions= "['x','".implode("' , '", $names2)."'],";
$results="";
$len = count($ids);
$len2 = count($ids2);
for($y=0 ; $y < $len ; $y++)
{
    $results.= "['".$names[$y];

    for($z=0 ; $z < $len2 ; $z++) {
        $result3 = mysqli_query($con, "SELECT COUNT(*) as countnumber
From hardware
  Inner Join prosecution On prosecution.prosecutionid = hardware.prosecutionid
  Inner Join category On category.categoryid = hardware.categoryid
  Left Join user_has_hardware On user_has_hardware.hardwareid =
    hardware.hardwareid
Where (user_has_hardware.hardwareid Is Null Or user_has_hardware.status = 0) AND prosecution.prosecutionid = $ids2[$z] AND category.categoryid = $ids[$y]") or die(mysqli_error($con));
        $row3 = mysqli_fetch_row($result3);
        $row3 = implode("", $row3);
        $results.= "' , '".$row3;

    }
    $results.= "'],";
}
?>


<script>
    $(document).ready(function () {
        c3.generate({
            bindto: '#lineChart2',
            size: {
                height: '100%',
            },
            data: {
                x : 'x',
                columns: [
                    <?php echo $prosecutions;

                    echo $results; ?>
                ],
            },
            axis: {
                x: {
                    type: 'category',
                    tick: {
                        rotate: 40,
                        size: 15,
                        multiline: false,
                    },
                }
            }
        });
    });
</script>
<?php

$resultof2 = mysqli_query($con, "Select category.categoryid,
  category.categoryname
From hardware
  Inner Join prosecution On prosecution.prosecutionid = hardware.prosecutionid
  Inner Join category On category.categoryid = hardware.categoryid
  Left Join user_has_hardware On user_has_hardware.hardwareid =
    hardware.hardwareid
Group By category.categoryid") or die(mysqli_error($con));

$resultof22 = mysqli_query($con, "Select prosecution.prosecutionid,
  prosecution.prosecutionname
From hardware
  Inner Join prosecution On prosecution.prosecutionid = hardware.prosecutionid
  Inner Join category On category.categoryid = hardware.categoryid
  Left Join user_has_hardware On user_has_hardware.hardwareid =
    hardware.hardwareid
Group By prosecution.prosecutionid") or die(mysqli_error($con));

$id2s = array();
$name2s = array();
while($row = mysqli_fetch_assoc($resultof2)){
    $id2s[] = $row["categoryid"];
    $name2s[] = $row["categoryname"];
}
$id2s2 = array();
while($row2 = mysqli_fetch_assoc($resultof22)){
    $id2s2[] = $row2["prosecutionid"];
    $name2s2[] = $row2["prosecutionname"];
}
$prosecutionsof2= "['x','".implode("' , '", $name2s2)."'],";
$resultof2s="";
$lenof2 = count($id2s);
$lenof22 = count($id2s2);
for($y=0 ; $y < $lenof2 ; $y++)
{
    $resultof2s.= "['".$name2s[$y];

    for($z=0 ; $z < $lenof22 ; $z++) {
        $resultof23 = mysqli_query($con, "SELECT COUNT(*) as countnumber
From hardware
  Inner Join prosecution On prosecution.prosecutionid = hardware.prosecutionid
  Inner Join category On category.categoryid = hardware.categoryid
  Left Join user_has_hardware On user_has_hardware.hardwareid =
    hardware.hardwareid
Where  prosecution.prosecutionid = $id2s2[$z] AND category.categoryid = $id2s[$y]") or die(mysqli_error($con));
        $row3 = mysqli_fetch_row($resultof23);
        $row3 = implode("", $row3);
        $resultof2s.= "' , '".$row3;

    }
    $resultof2s.= "'],";
}
?>


<script>
    $(document).ready(function () {
        c3.generate({
            bindto: '#lineChart3',
            size: {
                height: '100%',
            },
            data: {
                x : 'x',
                columns: [
                    <?php echo $prosecutionsof2;

                    echo $resultof2s; ?>
                ],
            },
            axis: {
                x: {
                    type: 'category',
                    tick: {
                        rotate: 40,
                        size: 15,
                        multiline: false,
                    },
                }
            }
        });
    });
</script>
</body>
<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/empty_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jul 2017 11:39:12 GMT -->


</html>