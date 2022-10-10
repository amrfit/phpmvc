<h1 class="title">افزودن مقاله</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?c=admin">خانه</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">افزودن مقاله</a></li>
</ul>
<div class="content-area">
<h4>افزودن مقاله</h4>
    <form action="" class="add-form" method="post" enctype="multipart/form-data">
        <div class="form-item">
            <label for="input1" class="w100">عنوان مقاله</label>
            <input type="text" id="input1" name="art[title]">
        </div>

        <div class="form-item">
            <label for="input2" class="w100">متن مقاله</label>
            <textarea id="input2" name="art[body]"></textarea>
        </div>

        <div class="form-item">
            <label for="input1" class="w100">دسته بندی مقاله</label>
            <select name="art[category]" id="">
                <option value="0">فاقد دسته بندی</option>
                <?php foreach ($categories as $cat): ?>
                <option value="<?php echo $cat['title']; ?>"><?php echo $cat['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-item">
            <label for="input3" class="w100">وضعیت</label>
            <div class="radio-input">
                <input type="radio" id="input3" name="art[status]" value="1" checked>
                <label for="input3">فعال</label>
            </div>

            <div class="radio-input">
                <input type="radio" id="input4" name="art[status]" value="0">
                <label for="input4">غیر فعال</label>
            </div>
        </div>

        <div class="form-item">
            <label for="input5" class="w100">فایل</label>
            <input type="file" id="input5" name="picture">
        </div>

        <button name="addartbtn">افزودن</button>
    </form>
</div>