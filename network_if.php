<?php 
  session_start();
  require_once("lib/db.php"); 
  if(!$_SESSION["logged_in"]) require_once("lib/auth.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KAIROS - Smart Attendance System</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Form Validation CSS -->
    <link href="dist/css/formValidation.min.css" rel="stylesheet">	
	
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Bootstrap Table -->
	<link href="bower_components/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
	
    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home_administrator.php"><img src="images/logo-alt.png" title="" alt=""></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
						<li>
                            <a href="users.php"><i class="fa fa-users fa-fw"></i> Users</a>
                        </li>
						<li>
                            <a href="detectors.php"><i class="fa fa-tasks fa-fw"></i> Detectors</a>
                        </li>
						                  
						<li>
                            <a href="tags.php"><i class="fa fa-tags fa-fw"></i> Tags</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cog fa-fw"></i> Setup<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="network_if.php">Network Interface</a>
                                </li>
                                <li>
                                    <a href="cluster.php">Cluster</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-cog"></i> Network Interfaces</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
			<div class="row">
			<div class="col-lg-12">
			<form id="ipForm" class="form-horizontal">
				<div class="form-group">
					<div class="row">
						<label class="col-xs-3 control-label">Ethernet IP address</label>
						<div class="col-xs-6">
							<input type="text" class="form-control" name="ip" maxlength="15" placeholder="Enter Ethernet IP Address" value="192.168.0.3"/>
						</div>
					</div>	
					<div class="row" style="height:10px;"></div>
					<div class="row">	
						<label class="col-xs-3 control-label">Ethernet Netmask</label>
						<div class="col-xs-6">
							<input type="text" class="form-control" name="netmask" maxlength="15" placeholder="Enter Ethernet Netmask" value="255.255.255.0"/>
						</div>
					</div>
					<div class="row" style="height:10px;"></div>
					<div class="row">	
						<label class="col-xs-3 control-label">Ethernet default gateway</label>
						<div class="col-xs-6">
							<input type="text" class="form-control" name="gw" maxlength="15" placeholder="Enter Ethernet default Gateway" value="192.168.0.1"/>
						</div>
					</div>
					<div class="row" style="height:30px;"></div>
					<div class="row">
						<label class="col-xs-3 control-label" >Wifi IP address</label>
						<div class="col-xs-6">
							<input type="text" class="form-control" name="ip_wf" maxlength="15"  placeholder="Enter Wifi IP Address"/>
						</div>
					</div>
					<div class="row" style="height:10px;"></div>					
					<div class="row">	
						<label class="col-xs-3 control-label" >Wifi Netmask</label>
						<div class="col-xs-6">
							<input type="text" class="form-control" name="netmask_wf" maxlength="15"  placeholder="Enter Wifi Netmask"/>
						</div>
				    </div>
					<div class="row" style="height:10px;"></div>
					<div class="row">	
						<label class="col-xs-3 control-label">Wifi default gateway</label>
						<div class="col-xs-6">
							<input type="text" class="form-control" name="gw_wf" maxlength="15" placeholder="Enter Wifi default Gateway"/>
						</div>
					</div>
					 <div class="row" style="height:10px;"></div>	
					 <div class="row">
						<div class="col-xs-9">
						<input type="button" class="btn btn-success pull-right" value="Update" name="update">
						</div>
					 </div>
				</div>
			</form>
			</div>
			</div>
            <!-- /.row -->
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- formValidation -->
	<script src="dist/js/formValidation.min.js"></script>
	<script src="dist/js/framework/bootstrap.min.js"></script>
	
	<!-- Bootstrap Table -->
	<script src="bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
	
    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
	
<script>
$(document).ready(function() {
    $('#ipForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            ip: {
                validators: {
                    ip: {
                        message: 'Please enter a valid IP address'
                    }
                }
            }
        }
    });
});
</script>	
	

</body>

</html>
