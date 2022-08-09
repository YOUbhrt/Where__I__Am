<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','where_i_am');
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
$query1 = $conn->prepare("SET NAMES UTF8");
$query1->execute();
if(mysqli_connect_errno()){
	die('Enable te connect to database'.mysql_connect_error());
}
$query = $conn->prepare("SELECT id_emp, name, description,lat, lng, type,image FROM emplacement;");
$query->execute();
$query->bind_result($id_emp, $name, $description,$lat,$lng ,$type,$image);
$department = array();
while($query->fetch()){

	$temp = array();
	$temp['id_emp'] = $id_emp;
	$temp['name'] = $name;
	$temp['description'] = $description;
	$temp['type'] = $type;
	$temp['lat'] = $lat;
	$temp['lng'] = $lng;
	$temp['image'] = $image;
	array_push($department, $temp);
}
echo json_encode($department);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta charset="utf-8">
</head>
<body>

</body>
</html>