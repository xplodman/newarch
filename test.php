<script src="js/jquery-3.1.1.min.js"></script>

<button type="button">Click Me</button>
<p></p>
<script type="text/javascript">
    $(document).ready(function(){
        $("button").click(function(){

            $.ajax({
                type: 'POST',
                url: 'p.php',
                success: function(data) {
                    alert("done");
                }
            });
        });
    });
</script>