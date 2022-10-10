<?php 
require_once "views/layouts/header.php"; ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">                     
                <div class="wrapper_content">
                    <h2>مقالات
                        <div class="dot_heading"></div>
                    </h2>
                    <div class="grid_wrapper">
                        <?php foreach ($articlesShow as $art): ?>
                        <div class="content_box">
                            <!--LIKE BUTTON START -->
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
                            <!--LIKE BUTTON END -->
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
<?php require_once "views/layouts/footer.php";