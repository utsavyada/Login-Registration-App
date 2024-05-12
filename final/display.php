<?php 
ini_set('display_errors',1);
error_reporting(E_ALL);
include"dbconnection.php";
$sql="SELECT * FROM `employee2`";
$result=mysqli_query($conn,$sql);
$data=array();
while($row =mysqli_fetch_assoc($result)){
    $data[] = $row;
}
$json_data=json_encode($data);
header('Content-type:application/json');
echo $json_data;
?>