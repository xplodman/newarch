<script>
    $(document).ready(function() {
        <?php
        if (isset($_SESSION['5inarch']['old_database_status'])){
        $old_database_status=$_SESSION['5inarch']['old_database_status'];
        $old_database=$_SESSION['5inarch']['old_database'];
        ?>
        setTimeout(function() {
            toastr.options = {
                tapToDismiss: false,
                onclick: false,
                closeOnHover: false,
                closeButton: false,
                debug: false,
                progressBar: false,
                preventDuplicates: false,
                positionClass: "toast-top-right",
                "showDuration": "1",
                "hideDuration": "0",
                "timeOut": "0",
                "extendedTimeOut": "0",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.
            <?php
            if ($old_database_status ==  "true"){
                echo"error('You are connected to old database name (".$old_database.")')";
            }else{
                echo "error('برجاء إعادة المحاولة', 'لم تتم العملية بنجاح')";
            }
            };?>;

        }, 1300);

    });
</script>