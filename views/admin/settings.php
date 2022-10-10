<h1 class="title">تنظیمات اصلی</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?c=admin">خانه</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">تنظیمات اصلی</a></li>
</ul>
<div class="content-area">
<h4>تنظیمات اصلی</h4>
    <form action="" class="add-form" method="post" enctype="multipart/form-data">
        <div class="form-item">
            <label for="input1" class="w100">عنوان سایت</label>
            <input type="text" id="input1" name="stg[name]" value="<?php echo $showSettings['name']; ?>">
        </div>

        <div class="form-item">
            <label for="input6" class="w100">لوگو سایت</label>
            <input type="file" id="input6" name="logo">
            <img src="/<?php echo $showSettings['logo']; ?>" alt="" height="45px">
        </div>

        <div class="form-item">
            <label for="input2" class="w100">متن فوتر سایت</label>
            <textarea id="input2" name="stg[footer]"><?php echo $showSettings['footertext']; ?></textarea>
        </div>

        <div class="form-item">
            <label for="input3" class="w100">تعداد محصولات در صفحه اصلی</label>
            <input type="number" id="input3" name="stg[perprd]" value="<?php echo $showSettings['products_per_page']; ?>">
        </div>

        <button name="settingsbtn">ذخیره</button>
    </form>
</div>