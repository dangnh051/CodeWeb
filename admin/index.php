<?php include ('./partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Thông tin chính</h1>
    <?php
    if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
    ?>
    <div class="col-4 text-center">
      <?php
      $sql = "SELECT * FROM category";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
      ?>
      <h1> <?php echo $count ?></h1>
      Danh mục
    </div>
    <div class="col-4 text-center">
      <?php
      $sql = "SELECT * FROM food";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
      ?>
      <h1><?php echo $count ?></h1>
      Món ăn
    </div>
    <div class="col-4 text-center">
      <?php
      $sql = "SELECT * FROM `order`";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
      ?>
      <h1><?php echo $count ?></h1>
      Đơn hàng
    </div>
    <div class="col-4 text-center">
      <?php
      $sql = "SELECT SUM(total) as Total FROM `order`";
      $res = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($res);
      $revenue = $row['Total']
      ?>
      <h1><?php echo $revenue ?>đ</h1>
      Doanh thu
    </div>

    <div class="clearfix"></div>
  </div>
</div>

<?php include ('./partial/footer.php') ?>