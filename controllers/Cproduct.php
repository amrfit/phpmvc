<?php
require_once "models/Mproduct.php";
$product = new Product();
$id = $_GET['id'];
$productShow = $product->showProduct($id);
$relatedProducts = $product->relatedProducts($productShow['category']);

require_once "views/products/singleprd.php";