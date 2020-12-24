<?php
ob_start();
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
$matno=$_GET['matno'];
?>
<?php
include '../inc/config.php';

$ret=mysqli_query($con,"SELECT * FROM stat where matno='$matno'");
$row=mysqli_fetch_array($ret);

$matno=$row['matno'];
$apm=$row['coordinator'];


 if($apm=='0'){
mysqli_query($con,"UPDATE stat SET coordinator='1' WHERE matno='$matno'");
 }            
 elseif($apm=='1'){
  mysqli_query($con,"UPDATE stat SET coordinator='0' WHERE matno='$matno'");
 }
 elseif($apm==''){
  mysqli_query($con,"UPDATE stat SET coordinator='0' WHERE matno='$matno'");
 }
 header('location: in-logbook.php');



?>

