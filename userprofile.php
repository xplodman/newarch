<?php
include_once "php/connection.php";
 include_once "php/checkauthentication.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PICAB ref | Hardware</title>

    <style type='text/css'> table {
            table-layout: fixed; /* nothing here - table is block, so should auto expand to as large as it can get without causing scrollbars? */
        }

        .left {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .middle {
            text-align: left;
            /* expand this column to as large as it can get within table? */
        }

        .wrap {
            word-wrap: break-word;
            /* use up entire cell this div is contained in? */
        }
    </style>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/c3/c3.min.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">


</head>

<body class="animated fadeIn">
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <font face="myFirstFont">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg"/>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Ahmed</strong>
                             </span> <span class="text-muted text-xs block">System admin<b
                                        class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <font color="red">PIC</font>AB<br><small>ref</small>
                        </div>
                    </li>
                    <li>
                        <a href="index.php">
                            <i class="fa fa-area-chart"></i> <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="users.php"><i class="fa fa-user-circle"></i> <span class="nav-label">Users</span></a>
                    </li>
                    <li class="active">
                        <a href="hardware.php"><i class="fa fa-microchip"></i> <span class="nav-label">Hardware</span></a>
                    </li>
                </ul>
            </font>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i> <span class="label label-danger">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading animated fadeInLeftBig">
            <div class="col-sm-4">
                <h2><p>User profile</p></h2>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRightBig">
            <div class="row m-b-lg m-t-lg">
                <div class="col-md-6">

                    <div class="profile-image">
                        <img src="img/a4.jpg" class="img-circle circle-border m-b-md" alt="profile">
                    </div>
                    <div class="profile-info">
                        <div class="">
                            <div>
                                <h2 class="no-margins">
                                    Alex Smith
                                </h2>
                                <h4>Founder of Groupeq</h4>
                                <small>
                                    There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form Ipsum available.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <table class="table small m-b-xs">
                        <tbody>
                        <tr>
                            <td>
                             sdfsdf
                            </td>

                        </tr>
                        <tr>
                            <td>
                              fg
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>154</strong> Tags
                            </td>
                            <td>
                                <strong>32</strong> Friends
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <small>Sales in last 24h</small>
                    <h2 class="no-margins">206 480</h2>
                    <div id="sparkline1"></div>
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
<div class="modal inmodal" id="addcat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated rollIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Insert category</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="php/insertcat.php" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10"><input name="categoryname" type="text" class="form-control"><span
                                class="help-block m-b-none">Like (Case - Monitor - Scanner - etc)</span></div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
                <button class="btn" type="reset">
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    Reset
                </button>
                <button class="btn btn-info" type="Submit" name="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Submit
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal inmodal" id="addpros" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated rollIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Insert prosecution</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="php/insertpros.php" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input name="prosecutionname" type="text" class="form-control">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="pull-left">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
                <button class="btn" type="reset">
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    Reset
                </button>
                <button class="btn btn-info" type="Submit" name="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Submit
                </button>
            </div>
            </form>
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

<!-- Select2 -->
<script src="js/plugins/select2/select2.full.min.js"></script>

<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>

<!-- Toastr -->
<script src="js/plugins/toastr/toastr.min.js"></script>

<!-- Sparkline -->
<script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

<script>
    $(document).ready(function() {


        $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 48], {
            type: 'line',
            width: '100%',
            height: '50',
            lineColor: '#1ab394',
            fillColor: "transparent"
        });


    });
</script>
</body>
</html>