<?php
require_once "models/Mindex.php";
$index = new Index();
$articles = $index->showَArticles();
$products = $index->products();

// SIGN UP 

if (isset($_POST['btnsignup'])) {
    $data = $_POST['frm'];
    $main->addUser($data);
}

if (isset($_POST['btnsignin'])) {
    $data = $_POST['frm'];
    $main->loginUser($data);
}



if (isset($_GET['like'])) {
    // LIKE 
    if (substr($_GET['like'],0,5) == 'liked') {
        $id = substr($_GET['like'],5,strlen((int)$_GET['like']-5));
        echo $id;
        if (@$_SESSION["like_".$id]==null) {
            @$_SESSION["like_".$id]+= '1';
            @$_SESSION["likevalue"]+= '1';
        }
    }

    // DISLIKE
    if (substr($_GET['like'],0,8) == 'disliked') {
        $id = substr($_GET['like'],8,strlen((int)$_GET['like']-8));
        if (@$_SESSION["like_".$id]!=null) {
            @$_SESSION["like_".$id] = null;
            @$_SESSION["likevalue"]--;
        }
    }
}



require_once "views/index/index.php";
