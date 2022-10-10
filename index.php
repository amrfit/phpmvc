<?php 

if ($_SERVER['REQUEST_URI'] === "/") {
    header("location:/index/");
}

require_once "public/config.php";
require_once "controllers/Cmain.php";

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

    <?php
    // question mark model add controllers
    @$controller = $_GET['c'] ? $_GET['c']:'index';
    if (file_exists("controllers/C".$controller.".php")) {
        require_once "controllers/C".$controller.".php";
    }
    ?>

</html>