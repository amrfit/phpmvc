<h1 class="title">افزودن دسته بندی</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?c=admin">خانه</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">افزودن دسته بندی</a></li>
</ul>
<div class="content-area">
    <h4>افزودن دسته بندی</h4>
    <form action="" class="add-form" method="post">
        <div class="form-item">
            <label for="input1" class="w100">عنوان دسته بندی</label>
            <input type="text" id="input1" name="cat[title]">
        </div>

        <div class="form-item">
            <label for="input1" class="w100">سربرگ</label>
            <select name="cat[parent]" id="">
                <option value="0">سربرگ</option>
                <?php foreach ($parentArtCat as $value): ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-item">
            <label for="input3" class="w100">وضعیت</label>
            <div class="radio-input">
                <input type="radio" id="input3" name="cat[status]" value="1" checked>
                <label for="input3">فعال</label>
            </div>

            <div class="radio-input">
                <input type="radio" id="input4" name="cat[status]" value="0">
                <label for="input4">غیر فعال</label>
            </div>
        </div>
        <button name='addartcatbtn'>افزودن</button>
    </form>
</div>