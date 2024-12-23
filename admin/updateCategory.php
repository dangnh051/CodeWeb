<?php include ('../admin/partial/menu.php') ?>

<div class="content">
  <div class="wrapper">
    <h1>Cập nhật Danh mục</h1>

    <?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM category WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
      $count = mysqli_num_rows($res);

      if ($count == 1) {
        $row = mysqli_fetch_array($res);
        // $id = $row['id'];
        $title = $row['title'];
        $current_image = $row['img_name'];  
        $featured = $row['featured'];
        $status = $row['status'];
      } else {
        header("location:" . SITEURL . "admin/category.php");
      }
    } else {
      // $_SESSION['delete'] = "Deleted unsuccessfully";
      header("location:" . SITEURL . "admin/category.php");
    }
    ?>

    <?php
    if (isset($_POST['submit'])) {
      $title = $_POST['title'];
      $img_name = ""; 
      $featured = $_POST['featured'];
      $status = $_POST['status'];

      if (isset($_FILES['img']['name'])) 
        $img_name = $_FILES['img']['name'];
        if ($img_name != '') {
          $img_path = $_FILES['img']['tmp_name'];

          $destination_path = '../images/category/' . $img_name;

          $upload = move_uploaded_file($img_path, $destination_path);

          if ($upload == false) {
            $_SESSION['update'] = "<div class='alert alert-danger'>Fail to upload</div>";
            header("location:" . SITEURL . "admin/addCategory.php");
            die();
          }
          $path = "../images/category/".$img_name;
          $remove = unlink($path);

          if($remove == false) {
            $_SESSION['remove'] =  "<div class='alert alert-danger'>Fail to remove</div>";
            header("location:".SITEURL."admin/category.php");
            die();
          }
        }
        else{
          $img_name = $current_image;
        }
      }
      else {
        $img_name = $current_image;
      }

      $sql = "UPDATE category SET
        title = '$title',
        featured = '$featured',
        img_name = '$img_name',
        status = '$status'
        WHERE id = $id
        ";

      $res = mysqli_query($conn, $sql);

      if ($res == true) { 
        $_SESSION['update'] = "<div class='alert alert-success'>Category updated successfully</div>";
        header("location:" . SITEURL . "admin/category.php");
      } else {  
        $_SESSION['update'] = "<div class='alert alert-danger'>Category updated unsuccessfully</div>";
        header("location:" . SITEURL . "admin/category.php");
      }
    }
    ?>

    <form action="" method="POST">
      <div class="mb-3">
        <label for="FormControlInput1" class="form-label">Phân loại</label>
        <input type="text" class="form-control" id="FormControlInput1" name="title" value="<?php echo $title; ?>">
      </div>

      <div class="mb-4 mt-4">
        Ảnh hiện tại: <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="100px">
      </div>

      <div class="mb-3">
        <label for="FormControlInput2" class="form-label">Ảnh mới</label>
        <input type="file" class="form-control" id="FormControlInput2" name="img" accept="image/*">
      </div>

      <div class="row">
        <div class="col-6">
          <div class="mb-2">Nổi bật</div>
          <div class="container">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="featured" id="flexRadioDefault1" value="Có"
              <?php if($featured=="Có"){echo 'checked';}?>>
              <label class="form-check-label" for="flexRadioDefault1">
                Có
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="featured" id="flexRadioDefault2" value="Không"
              <?php if($featured=="Không"){echo 'checked';}?>>
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
              <input class="form-check-input" type="radio" name="status" id="flexRadioDefault3" value="Sẵn sàng"
              <?php if($status=="Sẵn sàng"){echo 'checked';}?>>
              <label class="form-check-label" for="flexRadioDefault3">
                Sẵn sàng
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="flexRadioDefault4" value="Không sẵn sàng"
              <?php if($status=="Không sẵn sàng"){echo 'checked';}?>>
              <label class="form-check-label" for="flexRadioDefault4">
                Không sẵn sàng
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-2">
        <button type="submit" name="submit" class="btn btn-primary"> Cập nhật </button>
      </div>
    </form>
  </div>
</div>

<?php include ('../admin/partial/footer.php') ?>
