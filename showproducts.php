<?php
include 'config.php';
?> 

<?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>

                <!-- Inside the loop that displays products -->
                <form action="" method="post">
                    <div class="shopbox-contents">
                        <div class="fetchImg">
                            <img src="data:image;base64,<?php echo base64_encode($fetch_product['image']); ?>"
                                alt="Product Image">
                        </div>
                        <div class="name">
                            <h4><?php echo $fetch_product['name']; ?></h4>
                        </div>
                        <div class="price">
                            <h3>$<?php echo $fetch_product['price']; ?></h3>
                        </div>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="hidden" name="product_image"
                            value="<?php echo base64_encode($fetch_product['image']); ?>">
                        <input type="submit" class="btn" value="ADD" name="add_to_cart">
                    </div>
                </form>

                <?php 
            };
            };
            ?>