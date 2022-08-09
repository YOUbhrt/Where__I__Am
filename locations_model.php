<?php
require("db.php");

// Gets data from URL parameters.
if(isset($_GET['add_location'])) {
    add_location();
}


function add_location(){
    $con=mysqli_connect ("localhost", 'root', '','where_i_am');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO tbpoint " .
        " (id_point, lat, lng) " .
        " VALUES (NULL, '%s', '%s');",
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng));

    $result = mysqli_query($con,$query);
    echo json_encode("Inserted Successfully");
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}
function get_saved_locations(){
    $con=mysqli_connect ("localhost", 'root', '','where_i_am');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"select lng,lat from tbpoint ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
    $indexed = array_map('array_values', $rows);

    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
//*********************ADD LOCATION**************************


if(isset($_GET['add_location1'])) {
    add_location1();
}


function add_location1(){
    $con=mysqli_connect ("localhost", 'root', '','where_i_am');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO emplacement " .
        " (id_emp, lat, lng) " .
        " VALUES (NULL, '%s', '%s');",
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng));

    $result = mysqli_query($con,$query);
    echo json_encode("Inserted Successfully");
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}
function get_saved_locations1(){
    $con=mysqli_connect ("localhost", 'root', '','where_i_am');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con,"select lng,lat from emplacement ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
    $indexed = array_map('array_values', $rows);

    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}

?>