<?php 
include"dbconnection2.php";
$sql="SELECT * FROM`employee`";
$result=mysqli_query($conn,$sql);
$data=array();
while($row =mysqli_fetch_assoc($result)){
    $data[] = $row;
}
echo json_encode($data);
?>