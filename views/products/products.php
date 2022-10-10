<?php
require_once "views/layouts/header.php";?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wrapper_content">
                    <h2>فروشگاه 
                        <div class="dot_heading"></div>
                    </h2>
                    <div class="grid_wrapper">
                        <?php if ($archivePrd != null): 
                        foreach ($archivePrd as $product): 
                                ?>
                        <div class="content_box">
                            <a href="/product/<?php echo $product['id']; ?>">
                                <?php if ($product['discount'] > 0 ): ?>
                                <span class="discount_persent">
                                    <?php echo $product['discount']."%"; ?>
                                </span>
                                <?php endif; ?>
                                <figure>
                                    <img src="/<?php echo $product['image']; ?>" alt="">
                                </figure>
                                <div class="title">
                                <?php echo $product['name']; ?>
                                </div>
                                <div class="price">
                                    <?php if ($product['discount']>0){ ?>
                                        <div class="main">
                                        <?php echo number_format($product['price']); ?>
                                        </div>
                                        <div class="sell">
                                        <?php $sell = ($product['price']/100)*(100-$product['discount']);
                                        echo number_format($sell)." تومان"; ?>
                                        </div>
                                    <?php } else { ?>
                                        <?php echo number_format($product['price']); ?>
                                    <?php } ?>
                                </div>
                            </a>
                            <?php if (isset($_SESSION['login'])) { ?>
                                <div id="addtocart<?php echo $product['id']; ?>">
                                    <input type="hidden" name='prdid' value="<?php echo $product['id']; ?>">
                                    <button name="btnprdadd" type="submit" class="add_cart" onclick="AddToCart(<?php echo $product['id']; ?>)">
                                        <i class="krs-cart"></i>
                                        افزودن به سبد خرید
                                    </button>
                                </div>
                            <?php } else { ?>
                                <div id="addtocart<?php echo $product['id']; ?>">
                                    <input type="hidden" name='prdid' value="<?php echo $product['id']; ?>">
                                    <button name="loginnone" type="submit" class="add_cart disabledbtn" onclick="AddToCart(<?php echo $product['id']; ?>)">
                                        <i class="krs-cart"></i>
                                        افزودن به سبد خرید
                                    </button>
                                </div>
                            <?php } ?>
                        </div>
                        <?php endforeach; 
                        endif;  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>




<?php require_once "views/layouts/footer.php"; ?>