<?php 
$id=$_GET['id'];
echo $id;
$admin->deleteCategory($id);
header('location:index.php?c=admin&p=articlecat&a=list');
