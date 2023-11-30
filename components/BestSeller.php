<?php
function BestSellers($name, $slug, $del, $price, $image, $stars)
{
?>
    <div class="showcase">

        <a href="#" class="showcase-img-box">
            <img src=<?php echo "$image" ?> alt="baby fabric shoes" width="75" height="75" class="showcase-img">
        </a>

        <div class="showcase-content">

            <a href="#">
                <?php echo " <a href='product.php?product=" . $slug . "' class='showcase-title'>" . $name . "</a>";  ?>
                <!-- <h4 class="showcase-title"><?php echo "$name" ?></h4> -->
            </a>

            <div class="showcase-rating">
                <?php
                for ($i = 0; $i < 5; $i++) {
                    if ($i < $stars) {
                        echo '<ion-icon name="star"></ion-icon>';
                    } else {
                        echo '<ion-icon name="star-outline"></ion-icon>';
                    }
                }
                ?>
            </div>

            <div class="price-box">
                <del>$<?php echo "$del" ?></del>
                <p class="price">$<?php echo "$price" ?></p>
            </div>
        </div>

    </div>
<?php
}
