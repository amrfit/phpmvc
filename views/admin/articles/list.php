<h1 class="title">داشبورد</h1>
<ul class="breadcrumbs">
    <li><a href="#">خانه</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">داشبورد</a></li>
</ul>
<div class="content-area">
    <h4>افزودن چیزی</h4>
    <table class="tbl">
        <tr>
            <th>نام مقاله</th>
            <th>متن مقاله</th>
            <th>وضعیت</th>
            <th>دسته بندی</th>
            <th>لینک</th>
            <th>ویرایش</th>
            <th>حذف</th>
        </tr>

        <?php foreach ($articles as $art): ?>
        <tr>
            <td><?php echo $art['name']; ?></td>
            <td>
                <textarea><?php echo $art['body']; ?></textarea>
            </td>
            <td>
                <?php if ( $art['status'] == '1') {
                    echo "فعال";
                } else {
                    echo "غیر فعال";
                } ?>
            </td>
            <td><?php echo $art['category']; ?></td>
            <td>index.php?c=page&article=<?php echo $art['id']; ?></td>
            <td><a href="/index/admin/articles/edit/<?php echo $art['id']; ?>"><i class="bx bxs-edit-alt"></i></a></td>
            <td><a href="/index/admin/articles/delete/<?php echo $art['id']; ?>"><i class="bx bx-trash"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>