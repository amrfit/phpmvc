<?php 
$id=$_GET['id'];
$admin->deleteProductCat($id);
header('location:index.php?c=admin&p=productcat&a=list');
