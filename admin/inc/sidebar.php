<?php

$sd=mysqli_query($con,"SELECT name FROM admin WHERE email='".$_SESSION['email']."'");
$ds=mysqli_fetch_array($sd);
?>

 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/logo.png" alt="Naites Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Logbook</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/avatar04.png" class="img-circle elevation-2" alt="Josiah Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Hello, <?php echo $ds['name'];  ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
               Student Logbook
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view-logbook.php" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>View Student data</p>
                </a>
              </li>
            
            </ul>
          </li>



<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Student
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-student.php" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-student.php" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                 <p>View Student</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-group"></i>
              <p>
                Supervisor
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-sup.php" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Supervisor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-sup.php" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                 <p>View Supervisor</p>
                </a>
              </li>
            </ul>
          </li>

<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Co-ordinator
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-cod.php" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Co-ordinator</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-cod.php" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                 <p>View Co-ordinator</p>
                </a>
              </li>
            </ul>
          </li>

<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Hod
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-hod.php" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Hod</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-hod.php" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                 <p>View Hod</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Student Status
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="approved.php" class="nav-link">
                  <i class="fa fa-check-square nav-icon"></i>
                  <p>Approved Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="not-approved.php" class="nav-link">
                  <i class="fa fa-external-link-square nav-icon"></i>
                 <p>Unapproved Student</p>
                </a>
              </li>
            </ul>
          </li>

<li class="nav-item">
                <a href="view-c.php" class="nav-link">
                  <i class="fa fa-comment nav-icon"></i>
                  <p>Chat</p>
                </a>
              </li>

           <li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>



               <li class="nav-item">
                <a href="../inc/logout.php" class="nav-link" onClick="return confirm('Are you sure you want to Logout?')">
                  <i class="fa fa-sign-out nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>


          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
