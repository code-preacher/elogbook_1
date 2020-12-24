<?php
ob_start();
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
 include('../inc/config.php');

if(isset($_POST['submit'])){
extract($_POST);

$ql=mysqli_query($con,"update student set name='$name',password='$password',email='$email',phoneno='$phoneno',cname='$cname',caddress='$caddress',cspecialization='$cspecialization' where email='".$_GET['id']."'");

if($ql){
$_SESSION['pmsg']='<span style="color:#fff;">'."Student Data was successfully updated".'</span>';
$_GET['id']=$id;
}
else{
$_SESSION['pmsg']='<span style="color:#000;">'."Student Data was not successfully updated".'</span>';    
}
}

//header("location:s-profile.php");

?>