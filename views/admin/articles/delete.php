<?php 
$id=$_GET['id'];
echo $id;
$admin->deleteArticle($id);
header('location:/index/admin/articles/list/');
