<?php
include_once "php/connection.php";
include_once "php/checkauthentication.php";
include_once "php/functions.php";
?>
<!DOCTYPE html>
<html>

<?php
$pageTitle = 'Backup & restore';
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
                <h2><p>Backup & restore</p></h2>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRightBig">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Database backup</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="input-group">
                                        <input type="text" placeholder="enter a backup file name..." id="filename" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="button btn btn-primary btn-outline" type="Submit" name="backup" value="backup" onclick="check();">Go!
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Database restore</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput">
                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                        <span class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-default btn-file">
                                        <span class="fileinput-new">Select file</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" id="restore_file_path" accept=".sql">
                                    </span>
                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                                <button class="button btn btn-primary btn-outline" type="Submit" name="backup" value="backup" onclick="showFileName();">Go!</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Archive this term and start a new term</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="col-sm-12 input-group">
                                    <form class="form-horizontal" onsubmit="return confirm('Do you really want to archive and start a new term ?!');" method="post" action="old_databases/archive_term.php" >
                                        <div class="form-group">
                                            <font face="myFirstFont">
                                                <label class="col-sm-4 control-label">أسم الترم</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="archive_term_name" class="form-control">
                                                </div>
                                            </font>
                                        </div>
                                        <div class="form-group">
                                            <font face="myFirstFont">
                                                <label class="col-sm-4 control-label">الحد الأدنى من الرصيد </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="student_balance" class="form-control">
                                                </div>
                                            </font>
                                        </div>
                                        <div class="col-sm-2 col-sm-offset-10">
                                            <button type="submit" class="btn btn-primary">
                                                Go!
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Connect to old database</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="input-group">
                                    <form method="post" action="old_databases/old_database.php" >
                                        <div class="col-sm-8">
                                            <select class="form-control m-b" name="database_name">
                                                <?php
                                                $result2 = mysqli_query($con, "SELECT SCHEMA_NAME AS `Database` FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME LIKE '5inarch%'");
                                                while ($row2 = $result2->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row2['Database'] ?>"> <?php echo $row2['Database'] ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-primary">
                                                Go!
                                            </button>
                                        </div>
                                    </form>
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
<script src="js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- Sweet alert -->
<script src="js/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Data picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Select2 -->
<script src="js/plugins/select2/select2.full.min.js"></script>

<!-- Jasny -->
<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- DROPZONE -->
<script src="js/plugins/dropzone/dropzone.js"></script>

<!-- CodeMirror -->
<script src="js/plugins/codemirror/codemirror.js"></script>
<script src="js/plugins/codemirror/mode/xml/xml.js"></script>

<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>

<!-- Dual Listbox -->
<script src="js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

<!-- Toastr -->
<script src="js/plugins/toastr/toastr.min.js"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>

<script src="js/plugins/dataTables/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            initComplete: function () {
                this.api().columns(':eq(7),:eq(8)').every( function () {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo( $(column.header()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            },
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
                targets: [ 1 ]
            }],
            columnDefs: [{
                targets: [ 0 ],
                visible: false
            }],
            <?php
            if($_SESSION['5inarch']['role'] < 3) {
            ?>
            dom: 'Blfrtip'
            ,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            <?php
            }
            ?>
        });

    });
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

</script>
<script>
    $(document).ready(function() {
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
        $('.chosen-select2').chosen({width: "200px"});
        $(".category").select2({
            placeholder: "Select a category",
            allowClear: true
        });
        $(".storepros").select2({
            placeholder: "Select a prosecution",
            allowClear: true
        });
        // Setup - add a text input to each footer cell
        $('#example tfoot th').not("").each(function() {
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
    $('#data_1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: 'yyyy-m-d'
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 15; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div>' +
            '<input style="width: 50px" type="text" class="form-control" name="quantity[]"/>' +
            '<select class="chosen-select2 form-control" name="category[]">' +
            '<option></option>' +
            <?php
            $query6 = "SELECT * FROM `owncategory`";
            $results6=mysqli_query($con, $query6);
            //loop
            foreach ($results6 as $owncategory){
            ?>
            '<option value="<?php echo $owncategory["owncategoryid"];?>"><?php echo $owncategory["owncategoryname"];?></option>' +
            <?php
            }
            ?>
            '</select>' +
            '<input type="text" style="width: 250px" placeholder="item name" class="form-control" name="itemname[]">' +
            '<button class="btn btn-danger remove_button" type="button">' +
            '<i class="fa fa-minus"></i>' +
            '</button>' +
            '</div>'; //New input field html
        var x = 1; //Initial field counter is 1
        $(addButton).click(function(){ //Once add button is clicked
            if(x < maxField){ //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
                $('.chosen-select2').chosen({width: "200px"});

            }
        });
        $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
<script>
    function check()
    {
        if (document.getElementById('filename').value==""
            || document.getElementById('filename').value==undefined)
        {
            alert ("Please Enter a File Name");
        }else {
            backup_function(document.getElementById('filename').value);
        }
    }
    $('#filename').bind('keyup blur',function() {
        $(this).val($(this).val().replace(/[^A-Za-z0-9_-]/g,''))
    });
    function backup_function(filename) {
        $.ajax({
            type: "GET",
            url: "backup_restore/backup.php",
            data: "filename="+filename,
            success: function(data){
                swal({
                    title: "Done!",
                    text: "تم حفظ قاعدة البيانات.",
                    type: "success",
                    timer: 2000
                });

            }
        });
    }
</script>
<script type="text/javascript">
    function showFileName() {
        var fullPath = document.getElementById('restore_file_path').value;
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
        }

        $.ajax({
            type: "GET",
            url: "backup_restore/restore.php",
            data: "restore_file_path="+filename.slice(0, -4),
            success: function(){
                swal("Done!", "تم حفظ قاعدة البيانات بأسم 'data'.", "success"),
                    setTimeout(explode, 1);
            }
        });
    }
</script>

</body>
<?php include_once "layout/scripts.php"; ?>
</html>