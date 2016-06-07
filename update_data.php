<?php
require_once("connect_db.php");
$id = $_GET['id'];
$status = $_GET['status'];
$comment = $_GET['myComment'];

echo $id."<br>";
echo $status."<br>";
echo $comment."<br>";


if($id != null && $status != null){
$sqlPro ="UPDATE member set Status = " . $status . " WHERE ID = " . $id;
if (mysqli_query($con, $sqlPro)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}
}
	$sqlCom ="UPDATE member set Detail = " . $comment . " WHERE ID = " . $id;
if (mysqli_query($con, $sqlCom)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}



mysqli_close($con);
?>