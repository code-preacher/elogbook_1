<?php
ob_start();
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
 include('../inc/config.php');

$sd=mysqli_query($con,"SELECT matno FROM student WHERE email='".$_SESSION['email']."'");
$ds=mysqli_fetch_array($sd); 
$mt=$ds['matno'];

if(isset($_POST['submit'])){
extract($_POST);
$date=date("d-m-y @ g:i A");

$zd=mysqli_query($con,"SELECT week FROM logbook WHERE week='$week' and matno='$mt' ");
$zz=$zd->fetch_array();

if ($zz>0) {
$_SESSION['gmsg']='<span style="color:#000;">'."Week already has data, select another week".'</span>'; 
} 
else {

$ql=mysqli_query($con,"insert into logbook(matno,week,monday,tuesday,wednesday,thursday,friday,saturday,date_created) values('$mt','$week','$monday','$tuesday','$wednesday','$thursday','$friday','$saturday','$date')");

if($ql){
$_SESSION['gmsg']='<span style="color:#fff;">'."Logbook Data was successfully Added".'</span>';
}
else{
$_SESSION['gmsg']='<span style="color:#000;">'."Logbook Data was not successfully Added".'</span>';    
}

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
              <li class="breadcrumb-item active">Fill Logbook</li>
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
                <h3 class="card-title">Fill Logbook Data  :
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        <?php
        if (!empty($_SESSION['gmsg'])) {
           echo $_SESSION['gmsg'];
           $_SESSION['gmsg']="";
         } 
        ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form role="form"  method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputName">Week :</label>
                    
                    <select class="form-control" name="week" required="required">

                      <option>-----select week-----</option>

                      <?php
for ($i=1; $i <= 24; $i++) { 
echo "<option value=".$i.">".$i."</option>";
}
                      ?>
                     
                    </select>
                  </div>
                </div>
     
<div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputDay">Monday:</label>
                    <input type="text" name="monday" class="form-control" id="exampleInputDay" placeholder="Please enter task undergone on monday" required="required">
                  </div>
            </div>      
<div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tuesday :</label>
                    <input type="text" name="tuesday" class="form-control" id="exampleInputDay" placeholder="Please enter task undergone on tuesday" required="required">
                  </div>
              </div>
              
   <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Wednesday :</label>
                    <input type="text" name="wednesday" class="form-control" id="exampleInputDay" placeholder="Please enter task undergone on wednesday" required="required">
                  </div>
              </div>

<div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Thursday :</label>
                    <input type="text" name="thursday" class="form-control" id="exampleInputDay" placeholder="Please enter task undergone on thursday" required="required">
                  </div>
              </div>
<div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Friday :</label>
                    <input type="text" name="friday" class="form-control" id="exampleInputDay" placeholder="Please enter task undergone on friday" required="required">
                  </div>
              </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Saturday :</label>
                    <input type="text" name="saturday" class="form-control" id="exampleInputDay" placeholder="Please enter task undergone on saturday" required="required">
                  </div>
              </div>
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary col-md-3" name="submit">Submit Data</button>
                 
                </div>
              </form>
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