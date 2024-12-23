<?php include ('./partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Add Admin</h1>
    <br>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="FormControlInput1" class="form-label">Fullname</label>
        <input type="text" class="form-control" id="FormControlInput1" placeholder="Enter fullname" name="fullname">
      </div>

      <div class="mb-3">
        <label for="FormControlInput2" class="form-label">Username</label>
        <input type="text" class="form-control" id="FormControlInput2" placeholder="Enter username" name="username">
      </div>

      <div class="mb-3">
        <label for="FormControlInput3" class="form-label">Password</label>
        <input type="text" class="form-control" id="FormControlInput3" placeholder="Enter password" name="password">
      </div>

      <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-primary"> Add Admin</button>
      </div>
    </form>
  </div>
</div>

<?php include ('./partial/footer.php') ?>

<?php
if (isset($_POST['submit'])) {
  $fullName = $_POST['fullname'];
  $userName = $_POST['username'];
  $passWord = $_POST['password'];

  //SQL query to save data in database
  $sql = "INSERT INTO admin SET
      full_name = '$fullName',
      username = '$userName',
      password = '$passWord'
      ";

  $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
  $res = mysqli_query($conn, $sql) or die(mysqli_error());

  if ($res == true) {
    // display msg with session 
    $_SESSION['add'] = "<div class='alert alert-success'>Admin added successfully</div>";
    //redirect page
    header("location:" . SITEURL . "admin/admin.php");
  } else {
    $_SESSION['add'] = "<div class='alert alert-danger'>Admin added unsuccessfully</div>";
    header("location:" . SITEURL . "admin/admin.php");
  }
}
?>