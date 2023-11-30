<?php
function ShowCase($name, $slug, $stars, $price, $discount, $del, $images1, $images2)
{
?>
    <div class="showcase">

        <div class="showcase-banner">

            <img src=<?php echo "$images1"; ?> alt="Mens Winter Leathers Jackets" width="300" class="product-img default">
            <img src=<?php echo "$images2"; ?> alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">

            <p class="showcase-badge"><?php echo "$discount"; ?></p>

            <div class="showcase-actions">

                <button class="btn-action">
                    <ion-icon name="heart-outline"></ion-icon>
                </button>

                <button class="btn-action">
                    <ion-icon name="eye-outline"></ion-icon>
                </button>

                <button class="btn-action">
                    <ion-icon name="repeat-outline"></ion-icon>
                </button>

                <button class="btn-action">
                    <ion-icon name="bag-add-outline"></ion-icon>
                </button>

            </div>

        </div>

        <div class="showcase-content">
            <?php echo " <a href='product.php?product=" . $slug . "' class='showcase-category'>" . $name . "</a>";  ?>

            <div class=" showcase-rating">
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
                <p class="price">$<?php echo "$price"; ?></p>
                <del>$<?php echo "$del"; ?></del>
            </div>

        </div>

    </div>

<?php
}

?>