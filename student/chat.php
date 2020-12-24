<?php
ob_start();
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
include('../inc/config.php'); 
$fd=mysqli_query($con,"SELECT * FROM student WHERE email='".$_SESSION['email']."'");
$pv=mysqli_fetch_array($fd);
$nm=$pv['name'];
$sp=$pv['supervisor'];
?>

<?php
if(isset($_POST['comment'])) {
    $chat=$_POST['chat'];
    $date=date("d-m-y @ g:i A");
    $to=$_POST['stud'];
   $q = $con->prepare('insert into chat (sender,reciever,chat,date) values (?, ?, ?, ?)');
    $q->bind_param('ssss',$nm,$sp,$chat,$date);
    $q->execute() ; 
if ($q) {
$_SESSION['pmsg']="Message was sent successfully";
} else {
$_SESSION['pmsg']="Message was not sent successfully";
}

  }
?>


<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid  bg-dark">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Chat</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">My Chat  
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        <?php
        if (!empty($_SESSION['pmsg'])) {
           echo $_SESSION['pmsg'];
           $_SESSION['pmsg']="";
         } 
        ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">

                   <form action="#" method="post">
    
    <br>

     
        <textarea name="chat" cols="60" rows="3" required="required" class="input" placeholder="Chat with Student"></textarea>

        <label>
        <input type="submit" name="comment"  value="Reply" class="submit">
        </label>


    </form>  <br><br>
   
 
<?php
  $seat=mysqli_query($con,"SELECT * FROM chat where sender='$nm' or reciever='$nm' order by id desc");
 while($row3=mysqli_fetch_array($seat)){
 $chat=$row3['chat'];    
  $sender=$row3['sender'];
  $reciever=$row3['reciever'];
 $date=$row3['date'];
?>

                <div class="col-sm-6 offset-sm-3">
                    <div class="card">
                        <div style="padding: 12px;">
                           <?php echo $chat."<br/>"."<hr/><div class='offset-lg-6' style='font-size:12px;color:gray;'>".$sender."&nbsp;&nbsp;&nbsp;@&nbsp;&nbsp;".$date."</div>"; ?>

                        </div>
                    </div><br/><br/>
                </div>
                
               
<?php          
 }
         
?>

                 

                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
        <!-- Main row -->
       </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <br/><br/>
  <?php
include 'inc/footer.php';
?>