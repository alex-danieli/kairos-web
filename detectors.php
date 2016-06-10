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
                    <h1 class="page-header"><i class="fa fa-users"></i> Detectors <input type="button" class="btn btn-success" value="Add" name="add"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                  <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">KAIROS - DETECTORS</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="detectorsTable" data-toggle="table"
										data-toggle="table"
										data-url="api/detectorList.php"
										data-side-pagination="server"
										data-pagination="true"
										data-page-list="[5, 10, 20, 50, 100, 200,ALL]"
										data-search="true"
										data-id-field="id"
										data-mobile-responsive="true"
										
					   
								>
                                    <thead>
                                        <tr>
											<th data-field="id" data-sortable="true" data-width="1%">Id</th>
                                            <th data-field="de_detector" data-sortable="true">Description</th>
											<th data-field="cod_ipv4" data-formatter="ipAddressFormatter" data-sortable="true">IP Address</th>
											<th data-field="fg_status" data-formatter="statusFormatter" data-sortable="true" data-width="1%" data-align="center">Status</th>
                                            <th data-field="" data-formatter="operateFormatter" data-width="1%" data-align="center">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

	
    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- Bootstrap Table -->
	<script src="bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>	
	<script src="bower_components/bootstrap-table/src/extensions/mobile/bootstrap-table-mobile.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
  


    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

	<script>
	
       
		function operateFormatter(value, row, index) {
			return [
				'<a class="modify" href="javascript:void(0)" title="Modify">',
				'<i class="fa fa-edit fa-2x"></i>',
				'</a>  ',
				'<a class="remove" href="javascript:void(0)" title="Remove">',
				'<i class="fa fa-times fa-2x"></i>',
				'</a>'
			].join('');
		}
		
		function inet_aton(ip){
			// split into octets
			var a = ip.split('.');
			var buffer = new ArrayBuffer(4);
			var dv = new DataView(buffer);
			for(var i = 0; i < 4; i++){
				dv.setUint8(i, a[i]);
			}
			return(dv.getUint32(0));
		}


		function inet_ntoa(num){
			var nbuffer = new ArrayBuffer(4);
			var ndv = new DataView(nbuffer);
			ndv.setUint32(0, num);

			var a = new Array();
			for(var i = 0; i < 4; i++){
				a[i] = ndv.getUint8(i);
			}
			return a.join('.');
		}
		
		function ipAddressFormatter(value, row, index) {
			return inet_ntoa(value);
		}
		
		
		function statusFormatter(value, row, index) {
			if(value==0) return '<i class="fa fa-thumbs-down fa-2x"  style="color:red"></i>';
			if(value==1) return '<i class="fa fa-thumbs-up fa-2x " style="color:green"></i>';
		}		  

		
	</script>
	
</body>

</html>
