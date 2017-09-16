<?php
include_once "php/connection.php";
 include_once "php/checkauthentication.php";
?>
<!DOCTYPE html>
<html>

<?php
$pageTitle = 'Chat';
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
                <h2><p>Chat</p></h2>
            </div>
        </div>
        <div class="ibox chat-view animated fadeInRightBig">
            <div class="ibox-title">
<!--                <small class="pull-right text-muted">-->
<!--                    Last message:-->
<!--                    --><?php
//                    $lastmsg = mysqli_query($con,"Select message.createddate As lastmsg From message Where message.messageid = (Select Max(message.messageid) From message)") or die(mysqli_error($con));
//                    while($lastonemsg = mysqli_fetch_assoc($lastmsg)) {
//                        $sDate = $lastonemsg['lastmsg'];
//                        $newDate = date("j F Y, g:i a", strtotime($sDate));
//                        echo $newDate;
//                    }
//                    ?>
<!--                </small>-->
                Chat room panel
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-12 ">
                        <div id="main">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="chat-message-form">
                            <div class="form-group">
                                <textarea class="form-control message-input" id="usermsg" name="usermsg" placeholder="Enter message text"></textarea>
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
    $(function() {
        $("#usermsg").keypress(function (e) {
            if(e.which == 13) {

                var $form = $(this);
                // Let's select and cache all the fields
                var $inputs = $form.find("input, select, button, textarea");
                // Serialize the data in the form
                var serializedData = $form.serialize();
                // Let's disable the inputs for the duration of the Ajax request.
                // Note: we disable elements AFTER the form data has been serialized.
                // Disabled form elements will not be serialized.
                $inputs.prop("disabled", true);
                // Fire off the request to /form.php
                request = $.ajax({
                    url: "php/insertmessage.php",
                    type: "post",
                    data: serializedData
                });
                $(this).val("");
                e.preventDefault();
                $('#main').load('php/chatcontent.php #main', function() {});
            }
        });
    });
</script>
<script type="text/javascript" language="javascript">
    window.setInterval(function(){
        $('#main').load('php/chatcontent.php #main', function() {
            /// can add another function here
        });}, 500);
</script>
</body>
</html>