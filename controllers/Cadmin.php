<?php 
require_once "models/Madmin.php";
$admin = new Admin();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $article = $admin->showَArticle($id);
    $category = $admin->showَCategory($id);
}
$categories = $admin->showCategories();

if (isset($_POST['addartbtn'])) {
    $data = $_POST['art'];
    $pic = $_FILES['picture'];
    $to = $admin->uploader($pic,'articles','art');
    $admin->addArticle($data,$to);
}

if (isset($_POST['updatebtnart'])) {
    $pic = $_FILES['picture'];
    $art_data = $_POST['art'];
    $id = $_GET['id'];
    $to = $admin->uploader($pic,'articles','art');
    $admin->updateArticle($id,$art_data,$to);
    header('location:/admin/articles/list/');
}

$articles = $admin->showَArticles();
if (isset($_POST['addartcatbtn'])) {
    $cat = $_POST['cat'];
    $admin->addCategories($cat);
}
$parentArtCat = $admin->selectParentCategories();

if (isset($_POST['updatebtncat'])) {
    $art_data = $_POST['cat'];
    $id_art = $_GET['id'];
    $admin->updateCategory($id_art,$art_data);
    header('location:/admin/articlecat/list/');
}

/* PRODUCTS CODE */

if (isset($_POST['addprdbtn'])) {
    $data = $_POST['prd'];
    $pic = $_FILES['prdimage'];
    $to = $admin->uploader($pic,'products','prd');
    $admin->addProduct($data,$to);
}

$products = $admin->showَProducts();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $admin->showَProduct($id);
    if (isset($_POST['updateprdbtn'])) {
        $data = $_POST['prd'];
        $pic = $_FILES['prdimage'];
        $to = $admin->uploader($pic,'products','prd');
        $admin->updateProduct($id, $data,$to);
        header('location:/admin/products/list/');
    }
}

// PRODUCT CAT

if (isset($_POST['addprdcatbtn'])) {
    $data = $_POST['prdcat'];
    $admin->addProductCat($data);
}

$parentPrdCat = $admin->selectParentPrdCat();
$productCats = $admin->showProductCats();

// for edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productCat = $admin->showَProductCat($id);
    // for update
    if (isset($_POST['updateprdcatbtn'])) {
        $data = $_POST['prdcat'];
        $admin->updateProductCat($id, $data);
        header('location:/admin/productcat/list/');
    }
}

// MAIN SETTINGS

$showSettings = $admin->showَSettings();
if (isset($_POST['settingsbtn'])) {
    $data = $_POST['stg'];
    $pic = $_FILES['logo'];
    if ($pic['name'] != null) {
        $to = $admin->uploader($pic,'settings','stg');
    } else {
        $to = $showSettings['logo'];
    }
    $settings = $admin->updateSettings($data,$to);
    header("location:/admin/settings/");
}









require_once "views/admin/index.php";