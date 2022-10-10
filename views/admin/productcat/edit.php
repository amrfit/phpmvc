<h1 class="title">ویرایش دسته بندی محصولات</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?c=admin">خانه</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">ویرایش دسته بندی محصولات</a></li>
</ul>
<div class="content-area">
<h4>ویرایش دسته بندی</h4>
    <form action="" class="add-form" method="post">
        <div class="form-item">
            <label for="input1" class="w100">عنوان دسته بندی</label>
            <input type="text" id="input1" name="prdcat[title]" value="<?php echo $productCat['title']; ?>">
        </div>

        <div class="form-item">
            <label for="input1" class="w100">سربرگ</label>
            <select name="prdcat[parent]" id="">
                <option value="0">فاقد دسته بندی</option>
                <?php foreach ($productCats as $cat): ?>
                <option value="<?php echo $cat['id']; ?>"
                <?php if ($productCat['parent'] == $cat['title'] ) {echo "selected";} ?>
                ><?php echo $cat['title']; ?></option>
                <?php echo $productCat['parent']; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-item">
            <label for="input3" class="w100">وضعیت</label>
            <div class="radio-input">
                <input type="radio" id="input3" name="prdcat[status]" value="1"
                <?php if ($productCat['status']==='1') {echo "checked";} ?>>
                <label for="input3">فعال</label>
            </div>

            <div class="radio-input">
                <input type="radio" id="input4" name="prdcat[status]" value="0"
                <?php if ($productCat['status']==='0') {echo "checked";} ?>>
                <label for="input4">غیر فعال</label>
            </div>
        </div>

        <button name="updateprdcatbtn">ویرایش</button>
    </form>
</div>