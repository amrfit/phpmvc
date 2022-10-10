<h1 class="title">لیست محصولات</h1>
<ul class="breadcrumbs">
    <li><a href="#">خانه</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">لیست محصولات</a></li>
</ul>
<div class="content-area">
    <h4>لیست محصولات</h4>
    <table class="tbl">
        <tr>
            <th>عکس محصول</th>
            <th>نام محصول</th>
            <th>متن محصول</th>
            <th>اطلاعات کلی محصول</th>
            <th>قیمت محصول</th>
            <th>وضعیت</th>
            <th>دسته بندی</th>
            <th>تخیف</th>
            <th>تعداد</th>
            <th>لینک</th>
            <th>ویرایش</th>
            <th>حذف</th>
        </tr>

        <?php foreach ($products as $prd): ?>
        <tr>
            <td><img src="/<?php echo $prd['image']; ?>" alt=""></td>
            <td><?php echo $prd['name']; ?></td>
            <td>
                <textarea><?php echo $prd['description']; ?></textarea>
            </td>
            <td><?php echo $prd['details']; ?></td>
            <td><?php echo $prd['price']; ?></td>
            <td>
                <?php if ( $prd['status'] == '1') {
                    echo "فعال";
                } else {
                    echo "غیر فعال";
                } ?>
            </td>
            <td><?php echo $prd['category']; ?></td>
            <td><?php echo $prd['discount']; ?></td>
            <td><?php echo $prd['quantity']; ?></td>
            <td>index.php?c=page&article=<?php echo $prd['id']; ?></td>
            <td><a href="index.php?c=admin&p=products&a=edit&id=<?php echo $prd['id']; ?>"><i class="bx bxs-edit-alt"></i></a></td>
            <td><a href="index.php?c=admin&p=products&a=delete&id=<?php echo $prd['id']; ?>"><i class="bx bx-trash"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>