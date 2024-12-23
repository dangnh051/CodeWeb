<?php

  include('../config/constant.php'); 

  $id = $_GET['id'];

  $sql = "DELETE FROM admin WHERE id = $id";
  $res = mysqli_query($conn, $sql) or die(mysqli_error());
  
  if($res==true) {
    $_SESSION['delete'] = "<div class='alert alert-success'>Admin deleted successfully</div>";
    header("location:".SITEURL."admin/admin.php");
  }
  else{
    $_SESSION['delete'] = "<div class='alert alert-danger'>Admin deleted unsuccessfully</div>";
    header("location:".SITEURL."admin/admin.php");
  }
?>