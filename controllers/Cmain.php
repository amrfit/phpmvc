<?php 
session_start();
require_once "models/Mmain.php";
$main = new Main();
if (isset($_GET['c'])) {
    $main->setController($_GET['c']);
    $controller = $main->getController();
}

// SEARCH DATA
$main->searchData();

/*
// CART PRODUCTS START GET METHOD
if (isset($_GET['product']) && $_GET['product']!=null) {
    // add product
    if (substr($_GET['product'],0,3) === 'add') {
        $id = substr($_GET['product'],3,strlen($_GET['product'])-3);
        $prdQuantity = $main->showQuantityPrd($id);
        if ($prdQuantity['quantity'] != @$_SESSION['cart_'.$id]) {
            @$_SESSION["values"]+= '1';
            @$_SESSION['cart_'.$id] += '1';
        }
    }

    // remove product
    if (substr($_GET['product'],0,6) === 'remove') {
        $id = substr($_GET['product'],6,strlen($_GET['product'])-6);
        $_SESSION['cart_'.$id]--;
        $_SESSION["values"]--;
    }

    if (substr($_GET['product'],0,6) === 'delete') {
        $id = substr($_GET['product'],6,strlen($_GET['product'])-6);
        $_SESSION["values"]-=($_SESSION['cart_'.$id]);
        $_SESSION['cart_'.$id] = '0';
    }

}
// CART PRODUCTS END GET METHOD
*/

/*
// LIKE 
if (substr($_GET['like'],0,5) == 'liked') {
    $id = substr($_GET['like'],5,strlen((int)$_GET['like']-5));
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
*/

// LIKE 
if (isset($_POST['postlikeid'])) {
    $id = $_POST['postlikeid'];
    if (@$_SESSION["like_".$id]==null) {
        @$_SESSION["like_".$id]+= '1';
        @$_SESSION["likevalue"]+= '1';
    } else {
        @$_SESSION["like_".$id] = null;
        @$_SESSION["likevalue"]--;
    }
}

// DISLIKE
if (isset($_POST['deletepostlikeid'])) {
    $id = $_POST['deletepostlikeid'];
    @$_SESSION["like_".$id] = null;
    @$_SESSION["likevalue"]--;
}

if (isset($_POST['showLikedPosts'])) {
    $number = 1;
    $main->like();
    die();
}

// SHOW LIKED POSTS COUNT
if (isset($_POST['showLikedCount'])) {
    $like_count = $_SESSION['likevalue'];
    echo $like_count;
    die;
}

/*
if (isset($_POST['artid'])) {
    $id = $_POST['artid'];
    if (isset($_POST['liked'])) {
        if (@$_SESSION["like_".$id]==null) {
            @$_SESSION["like_".$id]+= '1';
            @$_SESSION["likevalue"]+= '1';
        }
    }
    if (isset($_POST['disliked'])) {
        if (@$_SESSION["like_".$id]!=null) {
            @$_SESSION["like_".$id] = null;
            @$_SESSION["likevalue"]--;
        }
    }
}
*/


// THEME SETTINGS
$settings = $main->getSettings();



// CART PRODUCTS START POST METHOD
if (isset($_POST['prdid'])) {
    $id = $_POST['prdid'];
    if (isset($_POST['btnprdadd'])) {
        $prdQuantity = $main->showQuantityPrd($id);
        if ($prdQuantity['quantity'] != @$_SESSION['cart_'.$id]) {
            @$_SESSION["prdvalues"]+= '1';
            @$_SESSION['cart_'.$id] += '1';
        }
    }
    if (isset($_POST['btnprdremove'])) {
        $_SESSION['cart_'.$id]--;
        $_SESSION["prdvalues"]--;
    }
    if (isset($_POST['btnprddelete'])) {
        $_SESSION["prdvalues"]-=($_SESSION['cart_'.$id]);
        $_SESSION['cart_'.$id] = '0';
    }
}
// CART PRODUCTS END POST METHOD

// PRODUCTS CAT MENU
$prdmenusparent = $main->showProductCatParent(); 
$prdmenus = $main->showProductCat(); 
$artmenusparent = $main->showArticleCatParent(); 
$artmenus = $main->showArticleCat(); 


// LOG OUT
if (isset($_POST['userlogout'])) {
    session_destroy();
    header('location:/index/');
}





// FOR PRODUCTS
    if (isset($_POST['productid'])) {
        $id = $_POST['productid'];
        $prdQuantity = $main->showQuantityPrd($id);
        if ($prdQuantity['quantity'] != @$_SESSION['cart_'.$id]) {
            @$_SESSION["prdvalues"]+= '1';
            @$_SESSION['cart_'.$id] += '1';
        }
    }

    if (isset($_POST['showCartPrds'])) {
        $main->cart();
        die;
    }

    if (isset($_POST['deleteproductid'])) {
        $id = $_POST['deleteproductid'];
        $_SESSION["prdvalues"]-=($_SESSION['cart_'.$id]);
        $_SESSION['cart_'.$id] = '0';
    }

    if (isset($_POST['subproductid'])) {
        $id = $_POST['subproductid'];
        $_SESSION['cart_'.$id]--;
        $_SESSION["prdvalues"]--;
    }

    // SHOW CART PRODUCTS COUNT
    if (isset($_POST['showCartCount'])) {
        $cart_count = $_SESSION["prdvalues"];
        echo $cart_count;
        die;
    }


