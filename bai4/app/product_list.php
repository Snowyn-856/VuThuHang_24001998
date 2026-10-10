<?php
require_once "view/header.php";
require_once "model/product.php";
$products = getAllProducts();
?>

<h2>Danh sách sản phẩm</h2>
<a href="product_add.php">Thêm sản phẩm</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th><th>Tên sản phẩm</th><th>Giá</th><th>Số lượng</th><th>Chức năng</th>
    </tr>
    <?php foreach($products as $row): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><?= $row['quantity'] ?></td>
        <td>
            <a href="product_edit.php?id=<?= $row['id'] ?>">Sửa</a> |
            <a href="product_delete.php?id=<?= $row['id'] ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once "view/footer.php";
?>