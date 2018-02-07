<?php
include_once "php/connection.php";
include_once "php/checkauthentication.php";
include_once "php/functions.php";
?>
<!DOCTYPE html>
<html>

<?php
$pageTitle = 'Config';
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
                <h2><p>Application configuration</p></h2>
            </div>
            <div class="col-sm-8">
                <font face="myFirstFont">
                    <div class="title-action">
                        <button class="btn btn-primary " type="button" data-toggle="modal"
                                data-target="#add_expenses"><i class="fa fa-dollar"></i> Add expenses
                        </button>
                    </div>
                </font>
            </div>
        </div>
        <div class="wrapper wrapper-content animated bounceInDown">
            <div class="row">

                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>view and edit application setting</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <form method="post" action="php/edit_application_setting.php" class="form-horizontal">
                                    <?php
                                    $application_settings_query = mysqli_query($con,"
SELECT * FROM `application_setting`
") or die(mysqli_error($con));
                                    $application_settings_info = mysqli_fetch_assoc($application_settings_query);
                                    ?>
                                    <div class="form-group">
                                        <font face="myFirstFont">
                                            <label class="col-sm-4 control-label">سعر الكورس</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="course_price" class="form-control" value="<?php echo $application_settings_info['course_price'] ?>">
                                            </div>
                                        </font>
                                    </div>
                                    <div class="form-group">
                                        <font face="myFirstFont">
                                            <label class="col-sm-4 control-label">سعر المراجعة النهائية</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="final_revision_price" class="form-control" value="<?php echo $application_settings_info['final_revision_price'] ?>">
                                            </div>
                                        </font>
                                    </div>
                                    <div class="form-group">
                                        <font face="myFirstFont">
                                            <label class="col-sm-4 control-label">سعر المادة في باقي الإعادة </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="one_material_price" class="form-control" value="<?php echo $application_settings_info['one_material_price'] ?>">
                                            </div>
                                        </font>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12 col-sm-offset-6">
                                            <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
                                            <button class="btn btn-info" type="Submit" name="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
<?php
include_once "layout/modals.php";
?>
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
    var chart = c3.generate({
        bindto: "#chart1",
        data: {
            columns: [
                <?php
                    $first_new = summary_all_in(1,'1');
                    while($y = mysqli_fetch_assoc($first_new)) {
                        echo "['".$y['reason']."','".$y['amount']."'],";
                    }
                ?>
            ],
            type: 'pie',
            empty: {
                label: {
                    text: "No Data Available"
                }
            }
        },
        pie: {
            label: {
                format: function(value, ratio, id) {
                    return value;
                }
            }
        }
    });
    var chart = c3.generate({
        bindto: "#chart2",
        data: {
            columns: [
                <?php
                    $first_new = summary_all_in(1,'2');
                    while($y = mysqli_fetch_assoc($first_new)) {
                        echo "['".$y['reason']."','".$y['amount']."'],";
                    }
                ?>

            ],
            type: 'pie',
            empty: {
                label: {
                    text: "No Data Available"
                }
            }
        },
        pie: {
            label: {
                format: function(value, ratio, id) {
                    return value;
                }
            }
        }
    });
    var chart = c3.generate({
        bindto: "#chart3",
        data: {
            columns: [
                <?php
                $first_new = summary_all_in(1,'3');
                while($y = mysqli_fetch_assoc($first_new)) {
                    echo "['".$y['reason']."','".$y['amount']."'],";
                }
                ?>

            ],
            type: 'pie',
            empty: {
                label: {
                    text: "No Data Available"
                }
            }
        },
        pie: {
            label: {
                format: function(value, ratio, id) {
                    return value;
                }
            }
        }
    });
    var chart = c3.generate({
        bindto: "#chart4",
        data: {
            columns: [
                <?php
                $first_new = summary_all_in(1,'4');
                while($y = mysqli_fetch_assoc($first_new)) {
                    echo "['".$y['reason']."','".$y['amount']."'],";
                }
                ?>

            ],
            type: 'pie',
            empty: {
                label: {
                    text: "No Data Available"
                }
            }
        },
        pie: {
            label: {
                format: function(value, ratio, id) {
                    return value;
                }
            }
        }
    });
    var chart = c3.generate({
        bindto: "#chart5",
        data: {
            columns: [
                <?php
                $first_new = summary_all_out(2);
                while($y = mysqli_fetch_assoc($first_new)) {
                    echo "['".$y['reason']."','".$y['amount']."'],";
                }
                ?>

            ],
            type: 'donut',
            empty: {
                label: {
                    text: "No Data Available"
                }
            }
        },
        donut: {
            label: {
                format: function(value, ratio, id) {
                    return value;
                }
            }
        }
    });
    var chart = c3.generate({
        bindto: "#chart6",
        data: {
            columns: [
                <?php
                $first_new = summary_all_aid();
                while($y = mysqli_fetch_assoc($first_new)) {
                    echo "['".$y['year']."','".$y['amount']."'],";
                }
                ?>

            ],
            type: 'donut',
            empty: {
                label: {
                    text: "No Data Available"
                }
            }
        },
        donut: {
            label: {
                format: function(value, ratio, id) {
                    return value;
                }
            }
        }
    });
</script>
</body>
</html>