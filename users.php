<?php
include_once "php/connection.php";
 include_once "php/checkauthentication.php";
?>
<!DOCTYPE html>
<html>

<?php
$pageTitle = 'Hardware';
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
        <div class="row wrapper border-bottom white-bg page-heading animated fadeInLeftBig">
            <div class="col-sm-4">
                <h2><p>Users</p></h2>
            </div>
            <div class="col-sm-8">
                <font face="myFirstFont">
                    <div class="title-action">
                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus"></i> Add a user</button>
                    </div>
                </font>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRightBig">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Search and view users information</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="table-responsive">
                                    <table id="example" class=" dataTables-example table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>extn</th>
                                            <th style="width:1em"></th>
                                            <th>Name</th>
                                            <th>Job</th>
                                            <th>Dom/App ID</th>
                                            <th>Dom/App PW</th>
                                            <th>Prosecution</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $result = mysqli_query($con,"
                                                Select user.username,
                                                  job.jobname,
                                                  user.userid,
                                                  user.userappid,
                                                  user.userapppw,
                                                  user.createddate,
                                                  prosecution.prosecutionname
                                                From job
                                                  Inner Join user On user.jobid = job.jobid
                                                  Inner Join prosecution On prosecution.prosecutionid = user.prosecutionid
                                                Order By user.username") or die(mysqli_error($con));
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $result2 = mysqli_query($con,"
Select category.categoryname,
  hardware.hardwarename,
  hardware.hardwaresn
From hardware
  Inner Join user_has_hardware On user_has_hardware.hardwareid =
    hardware.hardwareid
  Inner Join category On hardware.categoryid = category.categoryid
Where user_has_hardware.userid = $row[userid] ") or die(mysqli_error($con)); ?>
                                            <tr data-child-value="
                                                <?php
                                            while($row2 = mysqli_fetch_assoc($result2)) {
                                                echo $row2['categoryname']." - ".$row2['hardwarename']."- SN: ".$row2['hardwaresn'];
                                                if (mysqli_num_rows($result) > 1) {
                                                    echo "<br>";
                                                }
                                            }
                                            ?>
">
                                                <td>
                                                    <?php
                                                    $result2 = mysqli_query($con,"
Select category.categoryname,
  hardware.hardwarename,
  hardware.hardwaresn
From hardware
  Inner Join user_has_hardware On user_has_hardware.hardwareid =
    hardware.hardwareid
  Inner Join category On hardware.categoryid = category.categoryid
Where user_has_hardware.userid =  $row[userid] AND user_has_hardware.status = '1'") or die(mysqli_error($con));
                                                    while($row2 = mysqli_fetch_assoc($result2)) {
                                                        echo $row2['categoryname']." - ".$row2['hardwarename']."- SN: ".$row2['hardwaresn'];
                                                    }
                                                    ?>
                                                </td>
                                                <td class="details-control"></td>
                                                <td class="middle wrap"><?php echo $row['username'] ?></td>
                                                <td class="middle wrap"><?php echo $row['jobname'] ?></td>
                                                <td class="middle wrap"><font
                                                            size="3"><?php echo $row['userappid'] ?></font></td>
                                                <td class="middle wrap"><font
                                                            size="3"><?php echo $row['userapppw'] ?></font></td>
                                                <td class="middle wrap"><?php echo $row['prosecutionname'] ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
<!-- Select2 -->
<script src="js/plugins/select2/select2.full.min.js"></script>
<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>
<!-- Dual Listbox -->
<script src="js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>
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
        $('.dual_select').bootstrapDualListbox({
            selectorMinimalHeight: 160
        });
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
    function getId(val){
        //We create ajax function
        $.ajax({
            type: "POST",
            url: "php/gethardware.php",
            data: "prosecution="+val,
            success: function(data){
                $("#hardwarelist").html(data);
                $("#hardwarelist").bootstrapDualListbox('refresh', true);
            }
        });
    }
</script>
</body>
</html>