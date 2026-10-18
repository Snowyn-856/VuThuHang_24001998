<?php
#đăng nhập
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
require_once "view/header.php";
require_once "model/product.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    if ($name != "" && $price > 0 && $quantity >= 0) {
        addProduct($name, $price, $quantity);
        header("Location: product_list.php");
    } else {
        echo "Dữ liệu không hợp lệ!";
    }
}
?>

<h2>Thêm sản phẩm</h2>
<form method="post">
    Tên: <input type="text" name="name"><br>
    Giá: <input type="number" step="0.01" name="price"><br>
    Số lượng: <input type="number" name="quantity"><br>
    <button type="submit">Thêm</button>
</form>

<?php
require_once "view/footer.php";
?>