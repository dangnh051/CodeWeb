<?php include ('./partials/menu.php') ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Tìm kiếm món ăn" required>
            <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
}
?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Khám phá thực đơn</h2>

        <?php
        $sql = "SELECT * FROM category WHERE status = 'Sẵn sàng' AND featured = 'Có' LIMIT 3";
        $res = mysqli_query($conn, $sql);

        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $img_name = $row['img_name'];
                    ?>
                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <img src="<?php echo SITEURL; ?>/images/category/<?php echo $img_name; ?>" alt="Pizza"
                                class="img-responsive img-curve">
                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>
                    <?php
                }
            } else {
                echo "<div> Không tìm thấy thực đơn </div>";
            }
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Thực đơn</h2>

        <?php

        $sql2 = "SELECT * FROM food WHERE status = 'Sẵn sàng' AND featured = 'Có' LIMIT 6";
        $res2 = mysqli_query($conn, $sql2);

        if ($res2 == true) {
            $count2 = mysqli_num_rows($res2);
            if ($count2 > 0) {
                while ($row = mysqli_fetch_assoc($res2)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $img_name = $row['img_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $img_name; ?>" class="img-responsive img-curve">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price"><?php echo $price; ?>đ</p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Đặt món ngay</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div> Không có món ăn nào </div>";
            }
        }

        ?>

        <div class="clearfix"></div>

    </div>

    <p class="text-center">
        <a href="#">Tất cả Món ăn</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->

<?php include ('./partials/footer.php') ?>