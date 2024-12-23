<?php

  include('../config/constant.php'); 

  $id = $_GET['id'];
  $img_name = $_GET['img_name'];

  if($img_name != "") {
    $path = "../images/food/".$img_name;
    $remove = unlink($path); 

    if($remove == false) {
      $_SESSION['remove'] =  "<div class='alert alert-danger'>Fail to remove</div>";
      header("location:".SITEURL."admin/food.php");
      die();
    }
  }

  $sql = "DELETE FROM food WHERE id = $id";
  $res = mysqli_query($conn, $sql);
  
  if($res==true) {
    $_SESSION['delete'] = "<div class='alert alert-success'>Food deleted successfully</div>";
    header("location:".SITEURL."admin/food.php");
  }
  else{
    $_SESSION['delete'] = "<div class='alert alert-danger'>Food deleted unsuccessfully</div>";
    header("location:".SITEURL."admin/food.php");
  }
?>