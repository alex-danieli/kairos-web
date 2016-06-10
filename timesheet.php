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
                <a class="navbar-brand" href="home.php"><img src="images/logo-alt.png" title="" alt=""></a>
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
                            <a href="#"><i class="fa fa-cog fa-fw"></i> Attendance<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
							    <li>
                                    <a href="timesheet.php">Timesheet</a>
                                </li>
                                <li>
                                    <a href="attendance_logs.php">Logs</a>
                                </li>
                                <li>
                                    <a href="attendance_reports.php">Reports</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
 						<li>
                            <a href="pay_roll.php"><i class="fa fa-eur fa-fw"></i> Pay Roll</a>
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
                    <h1 class="page-header"><i class="fa fa-clock-o"></i> Timesheet</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
			
                <div class=\"row\" style="padding-bottom:20px;"><center><h1><span class="glyphicon glyphicon-backward" aria-hidden="true"></span>   Febrary 2016   <span class="glyphicon glyphicon-forward" aria-hidden="true"></span></h1></center></div>
				<?php
				   $timbrature_mensili=get_month_timesheet(2,2016,2);
				   $day_changed=false;
				   $first=true;
				   foreach ($timbrature_mensili as $timbratura){
			
					   list($data,$ora)=explode(" ",$timbratura["dt_detection"]);
					   $ora_s=substr($ora,0,-3);
					   if($timbratura["fk_detection_type"]==1) $icon="glyphicon-log-in";
					   if($timbratura["fk_detection_type"]==2) $icon="glyphicon-log-out";
					   if($first){
 						   echo "<div class=\"row\"><div class=\"btn-group\" role=\"group\" aria-label=\"...\"><button type=\"button\" class=\"btn btn-primary\">".$data."</button>";
						   $first=false;
					   }	     
                       else {
						   if($last_day!=$data && $data!=""){ 
							  echo "</div></div><div class=\"row\" style=\"height:10px;\"></div><div class=\"row\"><div class=\"btn-group\" role=\"group\" aria-label=\"...\"><button type=\"button\" class=\"btn btn-primary\">".$data."</button>";
						   }	 
					   }					   
					   
					   if($data!="") echo "<button type=\"button\" class=\"btn btn-default\">".$ora_s." <span class=\"glyphicon $icon\" aria-hidden=\"true\"></span></button>";
					   
					   $last_day=$data;
				   }
				   echo "</div></div>";
				   // print_r($timbrature);
				  
				?>
	              	<!--		
				  <button type="button" class="btn btn-default">1</button>
				  <button type="button" class="btn btn-default">2</button>

				  <div class="btn-group" role="group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					  Dropdown
					  <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
					  <li><a href="#">Dropdown link</a></li>
					  <li><a href="#">Dropdown link</a></li>
					</ul>
				  </div> -->
				 
				
				
            
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
	
    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    
   

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>