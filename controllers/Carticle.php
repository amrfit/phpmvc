<?php
require_once "models/Marticle.php";
$articles = new Articles();
if ($_GET['c'] === 'article') {
    $id = $_GET['id'];
    $article = $articles->showَArticle($id);
    $relatedPosts = $articles->relatedPosts($article['category']);
}

require_once "views/articles/singleart.php";