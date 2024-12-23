<?php include ('./partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Add Food</h1>
    <br>

    <?php
    if (isset($_POST['submit'])) { 
      $title = $_POST['title'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $category_id = $_POST['category'];
      $featured = $_POST['featured'];
      $status = $_POST['status'];

      if (isset($_FILES['img']['name'])) {
        $img_name = $_FILES['img']['name']; 
        if ($img_name != '') {
          $img_path = $_FILES['img']['tmp_name'];

          $destination_path = '../images/food/' . $img_name;

          $upload = move_uploaded_file($img_path, $destination_path);

          if ($upload == false) {
            $_SESSION['update'] = "<div class='alert alert-danger'>Fail to upload</div>";
            header("location:" . SITEURL . "admin/addFood.php");
            die();
          }
        }
      } else {
        $img_name = "";
      }

      $sql = "INSERT INTO food SET
      title = '$title',
      description = '$description',
      price = $price,
      img_name = '$img_name',
      category_id = $category_id,
      featured = '$featured',
      status = '$status'
      ";
      
      // Execute the query
      $res = mysqli_query($conn, $sql);

      if ($res == true) {
        $_SESSION['add'] = "<div class='alert alert-success'>Food added successfully</div>";
        header("location:" . SITEURL . "admin/food.php");
      } else {
        $_SESSION['add'] = "<div class='alert alert-danger'>Food added unsuccessfully</div>";
        header("location:" . SITEURL . "admin/food.php");
      }
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="FormControlInput1" class="form-label">Tên</label>
        <input type="text" class="form-control" id="FormControlInput1" placeholder="Enter title" name="title">
      </div>

      <div class="mb-3">
        <label for="FormControlInput2" class="form-label">Mô tả</label>
        <textarea class="form-control" id="FormControlInput2" placeholder="Description of the food"
          name="description"></textarea>
      </div>

      <div class="mb-3">
        <label for="FormControlInput3" class="form-label">Giá(đ)</label>
        <input type="number" class="form-control" id="FormControlInput3" placeholder="Enter price" name="price">
      </div>

      <div class="mb-3">
        <label for="FormControlInput3" class="form-label">Ảnh</label>
        <input type="file" class="form-control" id="FormControlInput3" name="img" accept="image/*">
      </div>

      <div class="mb-3">
        <label class="form-label">Danh mục</label>
        <select class="form-select" name="category">

          <?php
          $sql = "SELECT * FROM category WHERE status = 'sẵn sàng'";

          $res = mysqli_query($conn, $sql);

          $count = mysqli_num_rows($res);

          if ($count > 0) {

            while ($row = mysqli_fetch_assoc($res)) {
              $id = $row["id"];
              $title = $row["title"];
              ?>
              <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
              <?php
            }
          } else {
            ?>
            <option value="0">Không tìm thấy danh mục</option>
            <?php
          }
          ?>
        </select>
      </div>

      <div class="row">
        <div class="col-6">
          <div class="mb-2">Nổi bật</div>
          <div class="container">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="featured" id="flexRadioDefault1" value="Có" checked>
              <label class="form-check-label" for="flexRadioDefault1">
                Có
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="featured" id="flexRadioDefault2" value="Không">
              <label class="form-check-label" for="flexRadioDefault2">
                Không
              </label>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="mb-2">Trạng thái</div>
          <div class="container">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="flexRadioDefault3" value="sẵn sàng" checked>
              <label class="form-check-label" for="flexRadioDefault3">
                Sẵn sàng
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="flexRadioDefault4" value="không sẵn sàng">
              <label class="form-check-label" for="flexRadioDefault4">
                Không sẵn sàng
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-3">
        <button type="submit" name="submit" class="btn btn-primary"> Thêm </button>
      </div>
    </form>
  </div>
</div>

<?php include ('./partial/footer.php') ?>

<?php
if (isset($_POST['submit'])) {
}
?>