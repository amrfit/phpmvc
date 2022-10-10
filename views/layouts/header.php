
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فروشگاه خروسینو</title>
    <link rel="stylesheet" href="/public/css/default/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="/public/css/default/fonts.css">
    <link rel="stylesheet" href="/public/css/default/style.css">
    <link rel="stylesheet" href="/public/css/default/responsive.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header_wrapper">
                        <div class="logo_wrapper">
                            <a href="/index/">
                                <img src="/<?php echo $settings['logo']; ?>" alt="">
                                <h1 class="d-none d-sm-block"><?php echo $settings['name']; ?></h1>
                            </a>
                        </div>
                        <nav class="d-none d-lg-block">
                            <ul>
                                <li><a href=""><i class="krs-category"></i>دسته بندی</a>
                                    <ul>
                                    <?php foreach($prdmenusparent as $prdmenuparent): ?>
                                        <li>
                                            <a href="">
                                            <?php echo $prdmenuparent['title']; ?>
                                            </a>
                                            <?php if ($prdmenus != null) { ?>
                                            <ul>
                                                <?php foreach($prdmenus as $prdmenu): ?>
                                                    <li><a href=""><?php echo $prdmenu['title']; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php } ?>
                                        </li>
                                    <?php endforeach; ?>
                                    <?php foreach($artmenusparent as $artmenuparent): ?>
                                        <li>
                                            <a href="">
                                            <?php echo $artmenuparent['title']; ?>
                                            </a>
                                            <?php if ($artmenus != null) { ?>
                                            <ul>
                                                <?php foreach($artmenus as $artmenu): ?>
                                                    <li><a href=""><?php echo $artmenu['title']; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php } ?>
                                        </li>
                                    <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li><a href="/products/"><i class="krs-shopping"></i>فروشگاه</a></li>
                                <li><a href="/articles/"><i class="krs-paper"></i>مقالات</a></li>
                            </ul>
                        </nav>
                    <!-- <form action=""> -->
                        <div class="btns_wrapper">
                            <button class="header_btn header_search">
                                <i class="krs-search"></i>
                            </button>
                            <?php if (isset($_SESSION['login'])){ ?>
                                <button class="header_btn header_like">
                                    <!-- Give data with ajax-->
                                </button>
                                <button class="header_btn header_shopping">
                                    <!-- Give data with ajax-->
                                </button>
                                <button class="header_btn header_userlogout" name="logoutbtn">
                                    <i class="krs-exit"></i> 
                                    <div class="d-none d-sm-block">خروج از حساب</div>
                                </button>
                            <?php } else { ?>
                            <button class="header_btn header_user">
                                <i class="krs-user"></i> 
                                <div class="d-none d-sm-block">حساب کاربری</div>
                            </button>
                            <?php } ?>
                        </div>
                    <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="outside"></div>
        <div class="user_popup">
            <div class="wrapper">
                <div class="login_wrapper"> 
                    <img src="/images/logo.png" alt="">
                    <div id="signin_area">
                        <h1>ورود</h1>
                        <form action="" class="login_form" method="post">
                            <input type="email" name="frm[email]" placeholder="ایمیل">
                            <input type="password" name="frm[pwd]" placeholder="رمز عبور">
                            <button name="btnsignin">ورود</button>
                        </form>
                        <span>ثبت نام نکردی ؟ <button id="signup_btn">از اینجا ثبت نام کن</button></span>
                    </div>
                    <div id="signup_area" class="active">
                        <h1>ثبت نام</h1>
                        <form class="login_form" method="post">
                            <input type="text" name="frm[name]" placeholder="نام " required>
                            <input type="text" name="frm[lname]" placeholder="نام خانوادگی" required>
                            <input type="email" name="frm[email]" placeholder="ایمیل" required>
                            <input type="password" name="frm[pwd]" placeholder="رمز عبور" required>
                            <button name="btnsignup">ثبت نام</button>
                        </form>
                        <span>ثبت نام کردی ؟ <button id="signin_btn">از اینجا وارد شو</button></span>
                    </div>
            </div>
            </div>
        </div>
        <div class="cart_popup">
            <div class="wrapper">
                <table id="carttable">
                   <!-- Give data with ajax-->
                </table>
            </div>
        </div>
        <div class="like_popup">
            <div class="wrapper">
                <table id="liketable">
                        <!-- Give data with ajax-->
                </table>
            </div>
        </div>
        <div class="search_popup">
            <div class="wrapper">
                <form action="">
                    <input type="text" placeholder="دنبال چی میگردی؟" id="search">
                    <button class="header_btn header_search"><i class="krs-search"></i></button>
                </form>
                <ul class="searchres">
                </ul>
            </div>
        </div>
        <div class="user_logout_popup">
            <div class="wrapper">
                <div class="notice_massage">
                    آیا مطمئن هستید که میخواهید از حساب خارج شوید؟
                </div>
                <div class="wrapper_btns">
                    <form action="" method="post">
                        <button name="userlogout" class="logout_account">بله</button>
                    </form>
                    <button class="cancelbtn">خیر</button>
                </div>
            </div>
        </div>
    </header>
