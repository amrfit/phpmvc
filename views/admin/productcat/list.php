<h1 class="title">دسته بندی ها</h1>
<ul class="breadcrumbs">
    <li><a href="#">خانه</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">دسته بندی ها</a></li>
</ul>
<div class="content-area">
    <h4>لیست دسته بندی ها</h4>
    <table class="tbl">
        <tr>
            <th>نام دسته بندی</th>
            <th>وضعیت</th>
            <th>سربرگ</th>
            <th>ویرایش</th>
            <th>حذف</th>
        </tr>

        <?php foreach ($productCats as $value): ?>
        <tr>
            <td><?php echo $value['title']; ?></td>
            <td>
            <?php if ( $value['status'] == '1') {
                    echo "فعال";
                } else {
                    echo "غیر فعال";
                } ?>
            </td>
            <td><?php echo $value['parent']; ?></td>
            <td><a href="index.php?c=admin&p=productcat&a=edit&id=<?php echo $value['id']; ?>"><i class="bx bxs-edit-alt"></i></a></td>
            <td><a href="index.php?c=admin&p=productcat&a=delete&id=<?php echo $value['id']; ?>"><i class="bx bx-trash"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>