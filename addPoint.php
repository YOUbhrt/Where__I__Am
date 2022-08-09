<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:login.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql1 = "delete from  tbpoint  WHERE id_point=:id";
$query1 = $dbh->prepare($sql1);
$query1 -> bindParam(':id',$id, PDO::PARAM_STR);
$query1 -> execute();
$msg="Point succesfully deleated";
}
    ?>
<!doctype html>
<html class="no-js" lang="">
<head>
   <?php 
    include "includes/heade.html";
    include 'locations_model.php';
    ?>
       <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">

</head>
    <style>
    #map {
        height: 100%;
        height:450px ;
        width:100%; 
        }
    </style>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
                    <li class="active">
                        <a href="addPoint.php"> <i class="menu-icon fa fa-bullseye"></i>Add Points</a>
                    </li>
                    <li >
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
                        <h1>Add Point</h1>
                    </div>
                </div>
            </div>
            
        </div>
          <div class="content mt-3">
            <div class="animated fadeIn">
                <form method="post" id="signupForm">
                     <?php if($error){?><div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ban-circle"></i><strong>Erreur!!</strong> <?php echo htmlentities($error); ?> <a href="#" class="alert-link"></a>
                  </div><?php } 
                else if($msg){?><div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <i class="fa fa-ok-sign"></i><strong>Succès </strong> <?php echo htmlentities($msg); ?> <a href="#" class="alert-link"></a>.
                  </div><?php }?>
                <h5 class="heading-title mb-1 text-secondary">New point</h5>
                <div class="row">
                    <div class="card-body text-secondary">
                        <div class="col-sm-12 mb-4">
                            <div class="row">
                                <div class="col">
                                    <label>Latitude </label>
                                    <input type="text" id="lat" class="form-control"  name="lat" min="0" disabled="" required>
                                </div>
                                <div class="col-lg-2"> 
                                    <img  src="images/point.png" alt="Logo" style="margin-left: 30%">
                                </div>
                                <div class="col">
                                    <label>Longitude </label>
                                    <input type="text" id="lng" class="form-control" min="0" name="lng" disabled="" required> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="card-body text-secondary">
                            <div class="row">
                                <div class="col">
                                <button type="submit" class="btn btn-outline-success btn-lg btn-block" name="Submit" id="Submit" value="Submit" ><i class="fa fa-plus-square"></i>&nbsp; ADD</button>
                                </div>
                            </div>
                    </div>
                    
                    <div class="card-body text-secondary">
                        <div class="col-sm-12 mb-4">
                            <div class="row">
                    
                    <div id="map"></div>
                            </div>
                        </div>
                        </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID Point</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $sql = "SELECT id_point,lat,lng from  tbpoint";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            if($query->rowCount() > 0)
                            {
                            foreach($results as $result)
                            {               ?>  
                                        <tr>
                                            <td><?php echo htmlentities($result->id_point);?></td>
                                            <td><?php echo htmlentities($result->lat);?></td>
                                            <td><?php echo htmlentities($result->lng);?></td>
                                            <td style="width: 8%;"><a href="addPoint.php?del=<?php echo htmlentities($result->id_point);?>" onclick="return confirm('Do you want to delete');"> <i class="fa fa-trash-o fa-2x"></i></a></td>
                                            
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
<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <style>
    </style>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />

    <script>

        var saved_markers = <?= get_saved_locations() ?>;
        var user_location = [-6.812847756354472,34.0492800149581];
        mapboxgl.accessToken = 'pk.eyJ1IjoieW91YmhydCIsImEiOiJjanAxaTh4OXYybzZ6M2tzM2p1c3NmeTFhIn0.6Vd4CPRJtViI31VSpe9S1w';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/satellite-streets-v9',
            center: user_location,
            zoom: 17
        });
        //  geocoder here
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            // limit results to Australia
            //country: 'IN',
        });

        var marker ;

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            add_markers(saved_markers);

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            geocoder.on('result', function(ev) {
                alert("aaaaa");
                console.log(ev.result.center);

            });
        });
        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat,'click');
            //console.log(e.lngLat.lat);
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;

        });

        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true,color:"#28A745"})
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
        }
        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            console.log(geojson);
            // add markers to map
            geojson.forEach(function (marker) {
                console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker({color:"#0FFF3C",})
                    .setLngLat(marker)
                    .addTo(map);
            });

        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

        $('#signupForm').submit(function(event){
            event.preventDefault();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    </script>
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