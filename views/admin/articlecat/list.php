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

        <?php foreach ($categories as $cat): ?>
        <tr>
            <td><?php echo $cat['title']; ?></td>
            <td>
            <?php if ( $cat['status'] == '1') {
                    echo "فعال";
                } else {
                    echo "غیر فعال";
                } ?>
            </td>
            <td><?php echo $cat['parent']; ?></td>
            <td><a href="index.php?c=admin&p=articlecat&a=edit&id=<?php echo $cat['id']; ?>"><i class="bx bxs-edit-alt"></i></a></td>
            <td><a href="index.php?c=admin&p=articlecat&a=delete&id=<?php echo $cat['id']; ?>"><i class="bx bx-trash"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>