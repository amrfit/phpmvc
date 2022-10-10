<?php
require_once "models/Mlogin.php";
if (isset($_POST['btn_login'])) {
    $data = $_POST['frm'];
    $admin = new Admin();
    $admin->loginCheck($data);
}







require_once "views/login/login.php";