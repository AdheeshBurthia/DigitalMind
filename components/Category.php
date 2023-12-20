<?php
function Category($pdo)
{ ?>
    <div class="sidebar  has-scrollbar" data-mobile-menu>
        <div class="sidebar-category">
            <div class="sidebar-top">
                <h2 class="sidebar-title">Category</h2>
                <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                    <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>
            <ul class="sidebar-menu-category-list">
                <?php
                $conn = $pdo->open();
                try {
                    $stmt = $conn->prepare("SELECT  category.name AS category_name,category.id,category.icon,cat_slug, subcategory.* FROM subcategory LEFT JOIN category ON category.id = subcategory.subcategory_id
                       GROUP BY subcategory_id");
                    $stmt->execute();
                    foreach ($stmt as $row) {
                ?>
                        <li class="sidebar-menu-category">
                            <button class="sidebar-accordion-menu" data-accordion-btn>
                                <div class="menu-title-flex">
                                    <img src=<?php echo $row['icon'] ?> alt="clothes" width="20" height="20" class="menu-title-img">
                                    <p class="menu-title"><?php echo $row['category_name']; ?> </p>
                                </div>
                                <div>
                                    <ion-icon name="add-outline" class="add-icon"></ion-icon>
                                    <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                                </div>
                            </button>
                            <ul class="sidebar-submenu-category-list" data-accordion>
                                <?php
                                $x = $row['subcategory_id'];
                                $stmt = $conn->prepare("SELECT subcategory.*, COUNT(products.id) as product_count FROM subcategory LEFT JOIN products ON subcategory.id = products.subcategory_id WHERE subcategory.subcategory_id = :subcategory_id GROUP BY subcategory.id");
                                $stmt->bindParam(':subcategory_id', $x);
                                $stmt->execute();
                                foreach ($stmt as $subcategory) {
                                ?>
                                    <li class="sidebar-submenu-category">
                                        <a href='category.php?category=<?php echo $row['cat_slug']; ?>' class='sidebar-submenu-title'>
                                            <p class='product-name'><?php echo $subcategory['name']; ?></p>
                                            <data value="300" class="stock" title="Available Stock"><?php echo $subcategory['product_count']; ?></data>
                                        </a>
                                        <!-- <a href="#" class="sidebar-submenu-title">
                                            <p class="product-name"><?php echo $subcategory['subcategory']; ?> </p>
                                            <data value="300" class="stock" title="Available Stock"><?php echo $subcategory['product_count']  ?></data>
                                        </a> -->
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                <?php
                    }
                } catch (PDOException $e) {
                    echo "There is some problem in connection: " . $e->getMessage();
                }
                $pdo->close();
                ?>
            </ul>
        </div>
    </div>
<?php } ?>