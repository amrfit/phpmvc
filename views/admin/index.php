<?php 
if ($_SESSION['name'] == null) {
    header('location:/index/');
} else {
    $name = $_SESSION['name'];
}
?>
<head>
    <meta charset="UTF-8">
    <title>ادمین خروسینو</title>
    <link rel="stylesheet" href="/public/css/admin/boxicons.min.css">
    <link rel="stylesheet" href="/public/css/admin/style.css">
</head>
<body>
    <!--CONTENT START-->
    <section id="contect">
        <!--START NAVBAR-->
        <nav>
            <i class='bx bx-menu toggle-sidebar'></i>
            <form action="#" class="form-group">
                <input type="text" placeholder="جستجو کنید...">
                <i class='bx bx-search icon' ></i>
            </form>
            <a href="#" class="nav-link">
                <i class='bx bxs-bell icon' ></i>
                <span class="badge">5</span>
            </a>
            <a href="#" class="nav-link">
                <i class='bx bxs-message-square-dots icon' ></i>
                <span class="badge">8</span>
            </a>
            <span class="divider"></span>
            <div class="profile">
                <img src="public/images/admin/face.png" alt="">
                <ul class="profile-link">
                    <li><a href="#"><i class='bx bxs-user-circle icon'></i>پروفایل</a></li>
                    <li><a href="#"><i class='bx bxs-cog icon' ></i>تنظیمات</a></li>
                    <li><a href="#"><i class='bx bxs-log-out-circle icon'></i>خروج</a></li>
                </ul>
            </div>
        </nav>
        <!--END NAVBAR-->
        <!--START MAIN-->
        <main>
        <?php
        @$page = $_GET['p'] ? $_GET['p'] : 'dashboard';
        if ($_GET['a'] != null) {
            $action = $_GET['a'];
            require_once $page.'/'.$action.'.php';
        } else {
            require_once $page.'.php';
        }
        ?>
        </main>
        <!--END MAIN-->
    </section>
    <!--CONTENT END-->

        <!--side section start-->
    <section id="sidebar">
        <a href="#" class="brand"><i class='bx bxs-smile icon'></i>
            <?php echo $name; ?>
        </a>

        <ul class="side-menu">
            <li><a href="/admin/dashboard/" class="active"><i class='bx bxs-dashboard icon' ></i> داشبورد</a></li>
            <li class="divider" data-text="اصلی">اصلی</li>
            <li><a href="/admin/settings/"><i class='bx bx-cog icon'></i>تنظیمات اصلی</a></li>
            <li>
                <a href="#"><i class='bx bxs-inbox icon'></i>
                    مقالات
                <i class='bx bx-chevron-left icon-left'></i>
                </a>
                <ul class="side-dropdown">
                    <li><a href="/admin/articles/add/">افزودن مقاله</a></li>
                    <li><a href="/admin/articles/list/">لیست مقالات</a></li>
                    <li><a href="/admin/articlecat/add/">افزودن دسته بندی </a></li>
                    <li><a href="/admin/articlecat/list/">لیست دسته بندی </a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class='bx bxs-inbox icon'></i>
                    محصولات
                <i class='bx bx-chevron-left icon-left'></i>
                </a>
                <ul class="side-dropdown">
                    <li><a href="/admin/products/add">افزودن محصول</a></li>
                    <li><a href="/admin/products/list">لیست محصولات</a></li>
                    <li><a href="/admin/productcat/add">افزودن دسته بندی </a></li>
                    <li><a href="/admin/productcat/list">لیست دسته بندی </a></li>
                </ul>
            </li>
            <li><a href="#"><i class='bx bxs-widget icon' ></i> ویجت ها</a></li>
            <li class="divider" data-text="جدول و فرم">جدول و فرم</li>
            <li><a href="#"><i class='bx bx-table icon' ></i> جدول ها</a></li>

        </ul>

        <!-- <div class="ads">
            <div class="wrapper">
                <a href="#" class="btn-upgrade">آپگرید</a>
                <p>Become a <span>PRO</span> member and enjoy <span>All Feature</span></p>
            </div>
        </div> -->
    </section>
    <!--side section end-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
    <script src="/public/js/admin/script.js"></script>
</body>