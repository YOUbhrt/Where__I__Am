<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
    {   
header('location:login.php');
}
else{
if(isset($_POST['Submit']))
{
$lng=$_POST['lng'];
$lat=$_POST['lat'];
$name=$_POST['name'];
$type=$_POST['type'];
$image=$_FILES['image']['name'];
$description=$_POST['description'];
$target = "uploads/".basename($image);
$sql="INSERT INTO emplacement(lng,lat,name,type,description,image) VALUES(:lng,:lat,:name,:type,:description,:image)";
$query = $dbh->prepare($sql);
$query->bindParam(':lat',$lat,PDO::PARAM_STR);
$query->bindParam(':lng',$lng,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':image',$image,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $_SESSION["msg"] = "Image uploaded successfully";
    }else{
        $_SESSION["msg"]  = "Failed to upload image";
    }
if($lastInsertId)
{
$_SESSION["msg"] = "Location succesfully added";
header("Location: addEmplacement.php");
}
else 
{
$_SESSION["error"]="Something went wrong. Try Again!!";
}

}
    ?>
<!doctype html>
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
                        <h1>Edit Locations</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
            <form method="post" enctype="multipart/form-data">  
                <h5 class="heading-title mb-1 text-secondary">Location N° <?php echo htmlentities($result->id_emp);?> </h5>
                <div class="row">
                    <div class="card-body text-secondary">
                        <div class="col-sm-12 mb-4">
                            <div class="row">
                                <div class="col">
                                    <label>Latitude </label>
                                    <input type="text" id="lat" class="form-control"  name="lat"  value="<?php echo htmlentities($_GET['lat']);?>" required>
                                </div>
                                <div class="col-lg-2"> 
                                    <img  src="images/emplacement.png" alt="Logo" style="margin-left: 30%">
                                </div>
                                <div class="col">
                                    <label>Longitude </label>
                                    <input type="text" id="lng" class="form-control"  name="lng" value="<?php echo htmlentities($_GET['lng']);?>" required> 
                                </div>
                            </div>
                            
                             <div class="row">
                                <div class="col">
                                    <br>
                                    <label>Location Name</label>
                                    <input type="text" id="name" class="form-control"  name="name"  required>
                                </div>
                                <div class="col" >
                                    <br>
                                    <label>Type</label>
                            <select name="type" id="type" class="form-control" required>
                            <option value="Salles d'études">Salles d'études</option>
                            <option value="Administration">Administration</option>
                            <option value="installations sanitaires">installations sanitaires</option>
                            <option value="Instalations Sportives">Instalations sportives</option>
                            <option value="Autres">Autres</option>
                            </select>
                                </div>
                                <div class="col">
                                    <br>
                                    <label>Location Picture</label>
                                    <input type="file" id="image" name="image" class="form-control" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Description</label>
                                     <input type="text"  class="form-control" name="description" id="description" rows="4"  required>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body text-secondary">
                            <div class="row">
                                <div class="col">
                                <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="Submit" id="Submit" ><i class="fa fa-edit"></i>&nbsp; ADD</button>
                                </div>
                            </div>
                    </div>
                    
            </form>
        </div> <!-- .content -->
    
            
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