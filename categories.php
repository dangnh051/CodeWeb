<?php include ('./partials/menu.php') ?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Các món ăn chính</h2>

        <?php

        $sql = "SELECT * FROM category WHERE status = 'Sẵn sàng'";
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
                echo "<div> Category not found </div>";
            }
        }

        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->


<?php include ('./partials/footer.php') ?>