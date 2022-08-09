<!doctype html>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:login.php');
}
else{ ?>
<html class="no-js" lang="">
<head>
   <?php include "includes/heade.html";?>
</head>
<body>
        <!-- Left Panel -->
        <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/wim.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/w.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">General Management</h3><!-- /.menu-title -->
                    <li >
                        <a href="addPoint.php"> <i class="menu-icon fa fa-bullseye"></i>Add Points</a>
                        
                    </li>
                    <li >
                        <a href="addSegment.php"> <i class="menu-icon fa fa-arrows-v"></i>Add Segments</a>
                        
                    </li>
                    <li >
                        <a href="addEmplacement.php"> <i class="menu-icon fa fa-building-o"></i>Add Locations</a>
                    </li>
                     <li >
                      <a href="logout.php"><i class="menu-icon fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <!-- Header--><?php include "includes/header.html";?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success</span> Welcome Back ^_^
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>


<div class="col-sm-12 mb-4">
					<form method="post">
                        <div class="card-group">
                            <div class="card col-md-6 no-padding ">
                            	<?php $sql = "SELECT * FROM `emplacement` ";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $empcount=$query->rowCount();
                            ?>
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-building-o"></i>
                                    </div>

                                    <div class="h4 mb-0">
                                        <span class="count"> <?php echo $empcount;?> </span>
                                    </div>

                                    <small class="text-muted text-uppercase font-weight-bold">Department</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-md-6 no-padding ">
                            	<?php $sql = "SELECT * FROM `tbpoint` ";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $empcount=$query->rowCount();
                            ?>
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-bullseye"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                        <span class="count"><?php echo $empcount;?></span>
                                    </div>
                                    <small class="text-muted text-uppercase font-weight-bold">Points</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            <div class="card col-md-6 no-padding ">
                            	<?php $sql = "SELECT * FROM `admin` ";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $empcount=$query->rowCount();
                            ?>
                                <div class="card-body">
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                        <span class="count"><?php echo $empcount;?></span>
                                    </div>
                                    <small class="text-muted text-uppercase font-weight-bold">WebSite Admins</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                                </div>
                            </div>
                            
                            
                        </div>
					</form>
                    </div>
          

           
          


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
<?php } ?> 