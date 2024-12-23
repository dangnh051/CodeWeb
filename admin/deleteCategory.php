<?php

  include('../config/constant.php'); 

  $id = $_GET['id'];
  $img_name = $_GET['img_name'];

  if($img_name != "") {
    $path = "../images/category/".$img_name;
    $remove = unlink($path);
    
    if($remove == false) {
      $_SESSION['remove'] =  "<div class='alert alert-danger'>Fail to remove</div>";
      header("location:".SITEURL."admin/category.php");
      die();
    }
  }

  $sql = "DELETE FROM category WHERE id = $id";
  $res = mysqli_query($conn, $sql) or die(mysqli_error()); 
  
  if($res==true) {
    $_SESSION['delete'] = "<div class='alert alert-success'>Category deleted successfully</div>";
    header("location:".SITEURL."admin/category.php");
  }
  else{
    $_SESSION['delete'] = "<div class='alert alert-danger'>Category deleted unsuccessfully</div>";
    header("location:".SITEURL."admin/category.php");
  }
?>