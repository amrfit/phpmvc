<?php require_once "views/layouts/header.php"; 
?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wrapper_content">
                        <h2>محصولات جدید
                            <div class="dot_heading"></div>
                        </h2>
                        <div class="grid_wrapper">
                            <?php if ($products != null): 
                            $i = 0;
                            foreach ($products as $product): 
                                if (++$i>$settings['products_per_page']) break;
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
                                            <?php echo number_format($product['price'])." تومان"; ?>
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
                            
                    <div class="wrapper_content">
                        <h2>مقالات تازه
                            <div class="dot_heading"></div>
                        </h2>
                        <div class="grid_wrapper">
                            <?php foreach ($articles as $art): ?>
                            <div class="content_box">
                                <?php if (isset($_SESSION['login'])) { ?>
                                    <div id="postliked<?php echo $art['id']; ?>">
                                        <input type="hidden" name="artid" value="<?php echo $art['id']; ?>" id="likeid">
                                        <button name="liked" type="submit" class="article_like <?php if ($_SESSION['like_'.$art['id']] != null) { echo "active"; } ?>" id="likebtn" postid="<?php echo $art['id']; ?>" onclick="LikePost(<?php echo $art['id']; ?>)">
                                            <i class="krs-like"></i>
                                        </button>
                                    </div>
                                <?php } else { ?>
                                    <div id="postliked<?php echo $art['id']; ?>">
                                        <input type="hidden" name="artid" value="<?php echo $art['id']; ?>" id="likeid">
                                        <button name="liked" type="submit" class="article_like disabledbtn" id="likebtn" postid="<?php echo $art['id']; ?>" onclick="LikePost(<?php echo $art['id']; ?>)">
                                            <i class="krs-like"></i>
                                        </button>
                                    </div>
                                <?php } ?>
                                <a href="/article/<?php echo $art['id']; ?>">
                                    <figure>
                                        <img src="/<?php echo $art['image']; ?>" alt="">
                                    </figure>
                                    <div class="title">
                                        <?php echo $art['name']; ?>
                                    </div>
                                    <div class="date">
                                        <?php 
                                        $date = $art['date'];
                                        echo $main->getTime($date);
                                        ?>
                                    </div>
                                </a>
                                <a href="/article/<?php echo $art['id']; ?>" class="show_article">
                                    <i class="krs-paper"></i> 
                                    مشاهده مقاله
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php if (isset($_POST)) { ?>
        <?php if (isset($_POST['loginnone'])) { ?>
            <div class="massage_popup active">
                لطفا ابتدا وارد حساب کاربری خود شوید
            </div>
        <?php } ?>
    <?php } ?>
<?php require_once "views/layouts/footer.php"; ?>