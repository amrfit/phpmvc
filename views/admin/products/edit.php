<h1 class="title">ویرایش محصول</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?c=admin">خانه</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">ویرایش محصول</a></li>
</ul>
<div class="content-area">
<h4>ویرایش محصول</h4>
    <form action="" class="add-form" method="post" enctype="multipart/form-data">
        <div class="form-item">
            <label for="input1" class="w100">عنوان محصول</label>
            <input type="text" id="input1" name="prd[name]" value="<?php echo $product['name']; ?>">
        </div>

        <div class="form-item">
            <label for="input2" class="w100">متن محصول</label>
            <textarea id="input2" name="prd[desc]"><?php echo $product['description']; ?></textarea>
        </div>

        <div class="form-item">
            <label for="input3" class="w100">اطلاعات کلی محصول</label>
            <textarea id="input3" name="prd[detail]"><?php echo $product['details']; ?></textarea>
        </div>

        <div class="form-item">
            <label for="input10" class="w100">دسته بندی محصول</label>
            <select name="prd[category]" id="input10">
                <option value="0">فاقد دسته بندی</option>
                <?php foreach ($categories as $cat): ?>
                <option value="<?php echo $cat['title']; ?>"><?php echo $cat['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-item">
            <label for="input4" class="w100">وضعیت</label>
            <div class="radio-input">
                <input type="radio" id="input4" name="prd[status]" value="1" 
                <?php if ($product['status'] === '1') { echo "checked"; } ?>>
                <label for="input4">فعال</label>
            </div>

            <div class="radio-input">
                <input type="radio" id="input5" name="prd[status]" value="0"
                <?php if ($product['status'] === '0') { echo "checked"; } ?>>
                <label for="input5">غیر فعال</label>
            </div>
        </div>

        <div class="form-item">
            <label for="input6" class="w100">عکس محصول</label>
            <input type="file" id="input6" name="prdimage">
            <img src="<?php echo $product['image']; ?>" alt="" height="45px">
        </div>

        <div class="form-item">
            <label for="input7" class="w100">قیمت محصول</label>
            <input type="text" id="input7" name="prd[price]" value="<?php echo $product['price']; ?>">
        </div>

        <div class="form-item">
            <label for="input8" class="w100">تخفیف محصول</label>
            <select name="prd[discount]" id="input8" value="<?php echo $product['discount']; ?>">
                <?php for($i=0;$i<=100;$i+=5): ?>
                <option value="<?php echo $i ?>"
                <?php if ($product['discount'] == $i) {echo " selected";} ?>><?php echo $i ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-item">
            <label for="input9" class="w100">تعداد محصول در انبار</label>
            <input type="number" id="input9" name="prd[quantity]" value="<?php echo $product['quantity']; ?>">
        </div>

        <button name="updateprdbtn">ویرایش</button>
    </form>
</div>