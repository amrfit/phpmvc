<h1 class="title">ویرایش دسته بندی</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?c=admin">خانه</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">ویرایش دسته بندی</a></li>
</ul>
<div class="content-area">
<h4>ویرایش دسته بندی</h4>
    <form action="" class="add-form" method="post" enctype="multipart/form-data">
        <div class="form-item">
            <label for="input1" class="w100">عنوان دسته بندی</label>
            <input type="text" id="input1" name="cat[title]" value="<?php echo $category['title']; ?>">
        </div>

        <div class="form-item">
            <label for="input1" class="w100">سربرگ</label>
            <select name="cat[parent]" id="">
                <option value="0">فاقد دسته بندی</option>
                <?php foreach ($parentArtCat as $cat): ?>
                <option value="<?php echo $cat['id']; ?>"
                <?php if ($category['parent'] == $cat['title'] ) {echo "selected";} ?>
                ><?php echo $cat['title']; ?></option>
                <?php echo $category['parent']; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-item">
            <label for="input3" class="w100">وضعیت</label>
            <div class="radio-input">
                <input type="radio" id="input3" name="cat[status]" value="1"
                <?php if ($category['status']==='1') {echo "checked";} ?>>
                <label for="input3">فعال</label>
            </div>

            <div class="radio-input">
                <input type="radio" id="input4" name="cat[status]" value="0"
                <?php if ($category['status']==='0') {echo "checked";} ?>>
                <label for="input4">غیر فعال</label>
            </div>
        </div>

        <button name="updatebtncat">ویرایش</button>
    </form>
</div>