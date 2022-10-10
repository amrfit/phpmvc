<?php require_once "views/layouts/header.php"; ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single_wrapper">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
                            <img src="/<?php echo $article['image']; ?>" alt="">     
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
                            <div class="about_text">
                                <h2><?php echo $article['name']; ?></h2>
                                <?php echo $article['body']; ?>
                                <div class="post_details">
                                    <div class="detail_content">
                                        <i class="krs-category"></i>
                                        دسته بندی مقاله : 
                                        <?php echo $article['category'] ?>
                                    </div>
                                    <div class="detail_content">
                                        <i class="krs-edit"></i>
                                        منتشر شده در : 
                                        <?php echo $main->gettime($article['date']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper_content">
                    <h2>
                        مقالات مرتبط
                        <div class="dot_heading"></div>
                    </h2>
                    <div class="grid_wrapper">
                        <?php foreach($relatedPosts as $relate):
                            if ($article['id'] !== $relate['id']) : ?>
                            <div class="content_box">
                            <!--LIKE BUTTON START -->
                            <?php if (isset($_SESSION['login'])) { ?>
                                    <div id="postliked<?php echo $relate['id']; ?>">
                                        <input type="hidden" name="artid" value="<?php echo $art['id']; ?>" id="likeid">
                                        <button name="liked" type="submit" class="article_like <?php if ($_SESSION['like_'.$relate['id']] != null) { echo "active"; } ?>" id="likebtn" postid="<?php echo $relate['id']; ?>" onclick="LikePost(<?php echo $relate['id']; ?>)">
                                            <i class="krs-like"></i>
                                        </button>
                                    </div>
                                <?php } else { ?>
                                    <div id="postliked<?php echo $relate['id']; ?>">
                                        <input type="hidden" name="artid" value="<?php echo $relate['id']; ?>" id="likeid">
                                        <button name="liked" type="submit" class="article_like disabledbtn" id="likebtn" postid="<?php echo $relate['id']; ?>" onclick="LikePost(<?php echo $relate['id']; ?>)">
                                            <i class="krs-like"></i>
                                        </button>
                                    </div>
                                <?php } ?>
                                <!--LIKE BUTTON END -->
                                <a href="/article/<?php echo $relate['id']; ?>">
                                <figure>
                                    <img src="/<?php echo $relate['image']; ?>" alt="">
                                </figure>
                                <div class="title">
                                    <?php echo $relate['name']; ?>
                                </div>
                                <div class="date">
                                    <?php
                                    $date = $relate['date'];
                                     echo $main->getTime($date); ?>
                                </div>
                            </a>
                            <a href="/article/<?php echo $relate['id']; ?>" class="show_article">
                                <i class="krs-paper"></i> 
                                مشاهده مقاله
                            </a>
                        </div>
                        <?php 
                        endif;
                        endforeach; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once "views/layouts/footer.php"; ?>