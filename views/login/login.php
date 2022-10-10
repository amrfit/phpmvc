<?php 
if (@$_SESSION['error']!=null) {
    $_GET['error'] = $_SESSION['error'];
}

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به مدیریت خروسینو</title>
    <link rel="stylesheet" href="/public/css/default/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="/public/css/default/fonts.css">
    <link rel="stylesheet" href="/public/css/default/style.css">
    <link rel="stylesheet" href="/public/css/default/responsive.css">
</head>
<body>
    <main>
        <div class="login_wrapper"> 
                <img src="/public/images/default/logo.png" alt="">
                <h1>فروشگاه خروسینو</h1>
                <form action="" class="login_form" method="post">
                    <input type="text" name="frm[uname]" placeholder="نام کاربری">
                    <input type="password" name="frm[pwd]" placeholder="رمز عبور">
                    <button name="btn_login">ورود</button>
                </form>
        </div>
    </main>
    <?php if (@$_GET['error'] != null) { ?>
        <?php if ($_GET['error'] == 'password') { ?>
            <div class="massage_popup active">
                لطفا رمز عبور خود را به درستی وارد نمایید
            </div>
        <?php } ?>
    <?php } $_GET['error'] = null; ?>
</body>