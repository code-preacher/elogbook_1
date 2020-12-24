<?php
ob_start();
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
?>

<?php
include '../inc/config.php';
$j=mysqli_query($con,"delete from top_user where id='".$_GET['id']."'");
 if ($j) {
 header("location:view-hod.php");
 } else {
 header("location:view-hod.php");
 }
 


?>


