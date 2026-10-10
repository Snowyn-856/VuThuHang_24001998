<?php
require_once "view/header.php";
require_once "model/product.php";

$id = $_GET['id'];
$product = getProductById($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    if ($name != "" && $price > 0 && $quantity >= 0) {
        updateProduct($id, $name, $price, $quantity);
        header("Location: product_list.php");
    } else {
        echo "Dữ liệu không hợp lệ!";
    }
}
?>

<h2>Sửa sản phẩm</h2>
<form method="post">
    Tên: <input type="text" name="name" value="<?= $product['name'] ?>"><br>
    Giá: <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>"><br>
    Số lượng: <input type="number" name="quantity" value="<?= $product['quantity'] ?>"><br>
    <button type="submit">Cập nhật</button>
</form>

<?php
require_once "view/footer.php";
?>