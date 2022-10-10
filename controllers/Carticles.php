<?php 
require_once "models/Marticles.php";

$articles = new Articles();

$articlesShow = $articles->showArticles();






require_once "views/articles/articles.php";