<!-- Top Sale -->
<?php

shuffle($product_shuffle);

?>
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-size-20">Top Sale</h4>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
                <div class="item py-2">
                    <div class="product">
                        <a href="<?php printf('%s?id=%s', 'product.php', $item['id']); ?>">
                            <img src="<?php echo $item['image'] ?? "./assets/products/1.png"; ?>" alt="product1"
                                class="img-fluid">
                        </a>
                        <div class="text-center">
                            <h6>
                                <?php echo $item['name'] ?? "Unknown"; ?>
                            </h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>$<?php echo $item['price'] ?? '0'; ?></span>
                            </div>
                            <form method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $item['id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if (in_array($item['id'], $cart->getCartId($product->getData('cart')) ?? [])) {
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                } else {
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php 
            } // closing foreach function 
            ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !Top Sale -->