<?php
ob_start();
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();

?>
<?php
include '../inc/config.php';
$mt=mysqli_query($con,"select name,matno,cname,cspecialization from student ");
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
              <li class="breadcrumb-item active">View Student Logbook</li>
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
              <h3 class="card-title">View all Students Logbook </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body"><div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Matric Number</th>
                  <th>Company of Industrial Traning</th>
                  <th>Specialization of Company of Industrial Traning</th>
                  <th>View</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
while ($dy=$mt->fetch_array()) {
         ?>
                  <tr>
                    <td><?php echo $dy['name']; ?></td>
                    <td><?php echo $dy['matno']; ?></td>
                    <td><?php echo $dy['cname']; ?></td>
                    <td><?php echo $dy['cspecialization']; ?></td>
                    <td><a  href="view-log.php?matno=<?php echo $dy['matno']; ?>" ><i class="fa fa-eye"></i></a></td>
                    
                  </tr>

                <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Matric Number</th>
                  <th>Company of Industrial Traning</th>
                  <th>Specialization of Company of Industrial Traning</th>
                   <th>View</th>
                  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body --></div>
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