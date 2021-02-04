<?php
include_once('connect_db.php');

session_start();
if($_SESSION['useremail']==''){

header('location:index.php');
}
?>
 <?php 
 $title = "Admin Dashboard";
 include("header.php");
 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <h1>Admin Dashboard</h1>
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Admi Dashboard</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <?php include("footer.php");?>
