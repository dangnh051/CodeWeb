<?php include ('./partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Admin</h1>

    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }

    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }

    if (isset($_SESSION['update'])) {
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }

    if (isset($_SESSION['user_not_found'])) {
      echo $_SESSION['user_not_found'];
      unset($_SESSION['user_not_found']);
    }

    if (isset($_SESSION['password_not_match'])) {
      echo $_SESSION['password_not_match'];
      unset($_SESSION['password_not_match']);
    }

    if (isset($_SESSION['change_password'])) {
      echo $_SESSION['change_password'];
      unset($_SESSION['change_password']);
    }
    ?>

    <a class="btn btn-success" href="addAdmin.php">Thêm Admin</a>
    <br>
    <br>
    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          <th>STT</th>
          <th>Full name</th>
          <th>User name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
        $sql = "SELECT * FROM admin";
        $res = mysqli_query($conn, $sql);
        $sn = 1;
        if ($res == true) {
          $count = mysqli_num_rows($res);
          if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
              $id = $row['id'];
              $fullName = $row['full_name'];
              $userName = $row['username'];

              ?>

              <tr>
                <td><?php echo $sn++ ?></td>
                <td><?php echo $fullName ?></td>
                <td><?php echo $userName ?></td>
                <td>
                  <a href="<?php echo SITEURL; ?>admin/updatePassword.php?id=<?php echo $id; ?>" 
                  class="btn btn-warning">Đổi mật khẩu</a>
                  <a href="<?php echo SITEURL; ?>admin/updateAdmin.php?id=<?php echo $id; ?>"
                    class="btn btn-primary">Cập nhật</a>
                  <a href="<?php echo SITEURL; ?>admin/deleteAdmin.php?id=<?php echo $id; ?>"
                    class="btn btn-danger">Xóa</a>
                </td>
              </tr>

              <?php
            }
          } else {

          }
        }
        ?>
      </tbody>
    </table>
    <!-- <div class="clearfix"></div> -->
  </div>
</div>

<?php include ('./partial/footer.php') ?>