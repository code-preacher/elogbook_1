<?php
ob_start();
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();

include '../inc/config.php';
$fd=mysqli_query($con,"SELECT * FROM top_user WHERE email='".$_SESSION['email']."'");
$fg=mysqli_fetch_array($fd);
$nm=$fg['name'];

?>
<?php
$mt=mysqli_query($con,"select * from student where supervisor='$nm'");
?>

<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid bg-dark">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inspect Students</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Inspect all Students </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Matric Number</th>
                  
                  <th>View All Logbook Data</th>
                  <th>Student Status</th>
                  <th>Toggle</th>
                </tr>
                </thead>
                <tbody>
                <?php
while ($dy=$mt->fetch_array()) {
         ?>
                  <tr>
                    <td><?php echo $dy['name']; ?></td>
                    <td><?php echo $dy['matno']; ?></td>
                   
                    <td><a  href="view-logdata.php?matno=<?php echo $dy['matno']; ?>" ><i class="fa fa-eye"></i></a></td>
                
<td><?php 
$gt=mysqli_query($con,"select * from stat where matno=".$dy['matno']." ");
$xy=mysqli_fetch_array($gt);
if ($xy['supervisor']=='1') {
 echo "<i class='fa fa-check-circle text-success'></i>";
} else {
   echo "<i class='fa fa-remove text-danger'></i>";
}

?></td>

                 
                  <td><a href="toggle.php?matno=<?php echo $dy['matno']; ?>"><button class="btn btn-info btn-sm">Approve/Disapprove</button></a></td>
                  </tr>

                <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Matric Number</th>
                 
                  <th>View All Logbook Data</th>
                  <th>Student Status</th>
                  <th>Toggle</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <br/><br/>
  <?php
include 'inc/footer.php';
?>