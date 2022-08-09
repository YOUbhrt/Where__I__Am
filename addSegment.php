<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:login.php');
}
else{
if(isset($_POST['add']))
{
$X=$_POST['p1'];
$Y=$_POST['p2'];
$sql="INSERT INTO segment(id_point1,id_point2) VALUES(:X,:Y)";
$query = $dbh->prepare($sql);
$query->bindParam(':X',$X,PDO::PARAM_STR);
$query->bindParam(':Y',$Y,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Segment succesfully added";
}
else 
{
$error="Something went wrong. Try Again!!";
}

}

    ?>
<!doctype html>
<html class="no-js" lang="">
<head>
   <?php include "includes/heade.html";?>
       <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">

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
                    <li >
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">General Management</h3><!-- /.menu-title -->
                    <li >
                        <a href="addPoint.php"> <i class="menu-icon fa fa-bullseye"></i>Add Points</a>
                        
                    </li>
                    <li class="active">
                        <a href="addSegment.php"> <i class="menu-icon fa fa-arrows-v"></i>Add Segments</a>
                        
                    </li>
                    <li>
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
                        <h1>Add Segment</h1>
                    </div>
                </div>
            </div>
        </div>
          <div class="content mt-3">
            <div class="animated fadeIn">
 <form method="post">
                     <?php if($error){?><div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Erreur!!</strong> <?php echo htmlentities($error); ?> <a href="#" class="alert-link"></a>
                  </div><?php } 
                else if($msg){?><div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ok-sign"></i><strong>Succès </strong> <?php echo htmlentities($msg); ?> <a href="#" class="alert-link"></a>.
                  </div><?php }?>
                <h5 class="heading-title mb-1 text-secondary">New Segment</h5>
                <div class="row">
                    <div class="col">
                            <div class="card-body text-secondary">
                                <div class="col-sm-12 mb-4">
                           
                            <div class="card-body">

                                  <select data-placeholder="Choose a Point ID..." name="p1" class="standardSelect" tabindex="1">
                                    <option value=""></option>
                                    <?php $sql = "SELECT  id_point from tbpoint";
                                    $query = $dbh -> prepare($sql);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {   ?>                                            
                                    <option value="<?php echo htmlentities($result->id_point);?>"><?php echo htmlentities($result->id_point);?></option>
                                    <?php }} ?>
                                </select>
                        </div>
                    </div>
                </div>
                        </div>
                    <div class="col-lg-2"> 
                                    <img  src="images/segment.png" alt="Logo" style="margin-left: 30%;">
                                </div>
                    <div class="col">
                        <div class="card-body text-secondary">
                                <div class="col-sm-12 mb-4">
                           
                            <div class="card-body">

                                  <select data-placeholder="Choose a Point ID..." name="p2" class="standardSelect" tabindex="1">
                                    <option value=""></option>
                                    <?php $sql = "SELECT  id_point from tbpoint";
                                    $query = $dbh -> prepare($sql);
                                    $query->execute();
                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt=1;
                                    if($query->rowCount() > 0)
                                    {
                                    foreach($results as $result)
                                    {   ?>                                            
                                    <option value="<?php echo htmlentities($result->id_point);?>"><?php echo htmlentities($result->id_point);?></option>
                                    <?php }} ?>
                                </select>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
                <div class="card-body text-secondary">
                            <div class="row">
                                <div class="col">
                                <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="add" id="add"><i class="fa fa-plus-square"></i>&nbsp; ADD</button>
                                </div>
                            </div>
                    </div>
                <div class="col-md-12">
                    <div class="card">
                       
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID Segment</th>
                        <th>First Point ID</th>
                        <th>Second Point ID</th>
                        <th>length</th>
                      </tr>
                    </thead>
                    <tbody>
                         <?php $sql = "SELECT id_segment,id_point1,id_point2,longueur from  segment";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            if($query->rowCount() > 0)
                            {
                            foreach($results as $result)
                            {               ?>  
                                        <tr>
                                            <td><?php echo htmlentities($result->id_segment);?></td>
                                            <td>Point N°<?php echo htmlentities($result->id_point1);?></td>
                                            <td>Point N°<?php echo htmlentities($result->id_point2);?></td>
                                            <td><?php echo htmlentities($result->longueur);?></td>
                                        </tr>
                                    <?php }}?>
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- .content -->
    
            
        </div><!-- /#right-panel -->
    </div> <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

 <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
        <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>

 <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

</body>
</html>
<?php } ?> 