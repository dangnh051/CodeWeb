<?php

  if(!isset($_SESSION['user'])) {
    $_SESSION['no-login'] = "<div class='alert alert-danger'>Please login first</div>";
    header("location:" . SITEURL . "admin/login.php");
  }

?>