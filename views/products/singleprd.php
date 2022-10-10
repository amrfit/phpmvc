<?php require_once "views/layouts/header.php" ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single_wrapper">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <img src="/<?php echo $productShow['image']; ?>" alt="">     
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-5">
                            <div class="about_text">
                                <h2><?php echo $productShow['name']; ?></h2>
                                <?php echo $productShow['description']; ?>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="prd_box">
                                <div class="price">
                                    قیمت :
                                    <?php echo number_format($productShow['price'])." تومان"; ?>
                                </div>
                                <div class="discount">
                                    میزان تخفیف : 
                                    <span>
                                        <?php
                                        if($productShow['discount']>0) {
                                            echo "%".$productShow['discount'];
                                        } else { echo "ندارد"; }  ?>
                                    </span>
                                </div>
                                <div class="details">
                                دسته بندی محصول: <?php 
                                if ($productShow['category'] == 0) {
                                    echo "بدون دسته بندی";
                                } else {
                                    echo $productShow['category']."<br />";
                                } ?>
                                <?php echo $productShow['details']; ?>

                                </div>
                                <!-- <form action="" method="post">
                                    <input type="hidden" name='prdid' value="<?php echo $productShow['id']; ?>">
                                    <button name="btnprdadd" type="submit" class="add_cart">
                                        <i class="krs-cart"></i>
                                        افزودن به سبد خرید
                                    </button>
                                </form> -->
                                <?php if (isset($_SESSION['login'])) { ?>
                                    <div id="addtocart<?php echo $productShow['id']; ?>">
                                        <input type="hidden" name='prdid' value="<?php echo $productShow['id']; ?>">
                                        <button name="btnprdadd" type="submit" class="add_cart" onclick="AddToCart(<?php echo $productShow['id']; ?>)">
                                            <i class="krs-cart"></i>
                                            افزودن به سبد خرید
                                        </button>
                                    </div>
                                <?php } else { ?>
                                    <div id="addtocart<?php echo $productShow['id']; ?>">
                                        <input type="hidden" name='prdid' value="<?php echo $productShow['id']; ?>">
                                        <button name="loginnone" type="submit" class="add_cart disabledbtn" onclick="AddToCart(<?php echo $productShow['id']; ?>)">
                                            <i class="krs-cart"></i>
                                            افزودن به سبد خرید
                                        </button>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper_content">
                    <h2>
                        محصولات مرتبط
                        <div class="dot_heading"></div>
                    </h2>
                    <div class="grid_wrapper">
                        <?php foreach($relatedProducts as $relate) :
                            if ($productShow['id'] != $relate['id']): ?>
                        <div class="content_box">
                            <a href="/product/<?php echo $relate['id']; ?>">
                                <?php if ($relate['discount'] > 0 ): ?>
                                    <span class="discount_persent">
                                        <?php echo $relate['discount']."%"; ?>
                                    </span>
                                <?php endif; ?>
                                <figure>
                                    <img src="/<?php echo $relate['image']; ?>" alt="">
                                </figure>
                                <div class="title">
                                    <?php echo $relate['name']; ?>
                                </div>
                                <div class="price">
                                    <div class="main">
                                    <?php echo number_format($relate['price']); ?>
                                    </div>
                                    <div class="sell">
                                    <?php $sell = ($relate['price']/100)*(100-$relate['discount']);
                                    echo number_format($sell) ?>
                                    </div>
                                </div>
                            </a>
                            <?php if (isset($_SESSION['login'])) { ?>
                                <div id="addtocart<?php echo $relate['id']; ?>">
                                    <input type="hidden" name='prdid' value="<?php echo $relate['id']; ?>">
                                    <button name="btnprdadd" type="submit" class="add_cart" onclick="AddToCart(<?php echo $relate['id']; ?>)">
                                        <i class="krs-cart"></i>
                                        افزودن به سبد خرید
                                    </button>
                                </div>
                            <?php } else { ?>
                                <div id="addtocart<?php echo $relate['id']; ?>">
                                    <input type="hidden" name='prdid' value="<?php echo $relate['id']; ?>">
                                    <button name="loginnone" type="submit" class="add_cart disabledbtn" onclick="AddToCart(<?php echo $relate['id']; ?>)">
                                        <i class="krs-cart"></i>
                                        افزودن به سبد خرید
                                    </button>
                                </div>
                            <?php } ?>
                        </div>
                        <?php endif; endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once "views/layouts/footer.php" ?>