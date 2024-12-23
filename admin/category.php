<?php include ('./partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Danh mục</h1>
    <br>
    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }

    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }

    if (isset($_SESSION['remove'])) {
      echo $_SESSION['remove'];
      unset($_SESSION['remove']);
    }

    if (isset($_SESSION['update'])) {
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }
    ?>

    <a class="btn btn-success" href="addCategory.php">Thêm Danh mục</a>
    <br>
    <br>
    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          <th>STT</th>
          <th>Phân loại</th>
          <th>Hình ảnh</th>
          <th>Nổi bật</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        <?php
        $sql = "SELECT * FROM category";
        $res = mysqli_query($conn, $sql);
        $sn = 1;
        if ($res == true) {
          $count = mysqli_num_rows($res);
          if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
              $id = $row['id'];
              $title = $row['title'];
              $img_name = $row['img_name'];
              $featured = $row['featured'];
              $status = $row['status'];
              ?>

              <tr>
                <td><?php echo $sn++ ?></td>
                <td><?php echo $title ?></td>
                <td>
                  <img src="<?php echo SITEURL; ?>images/category/<?php echo $img_name; ?>" width="100px">
                </td>
                <td><?php echo $featured ?></td>
                <td><?php echo $status ?></td>
                <td>
                  <a href="<?php echo SITEURL; ?>admin/updateCategory.php?id=<?php echo $id; ?>"
                    class="btn btn-primary">Cập nhật</a>
                  <a href="<?php echo SITEURL; ?>admin/deleteCategory.php?id=<?php echo $id; ?>&img_name=<?php echo $img_name; ?>"
                    class="btn btn-danger">Xóa</a>
                </td>
              </tr>
              <?php
            }
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php include ('./partial/footer.php') ?>