<?php 
require_once "models/Mproducts.php";

$products = new Products();

$archivePrd = $products->products();




require_once "views/products/products.php";