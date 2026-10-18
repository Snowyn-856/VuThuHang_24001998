<?php
#đăng nhập
session_start();
if (!isset($_SESSION['username'])) {
    // Nếu chưa đăng nhập thì chuyển về login.php
    header("Location: login.php");
    exit();
}
require_once "view/header.php";
require_once "model/product.php";

$id = $_GET['id'];
$product = getProductById($id);

if (!$product) {
    echo "Sản phẩm không tồn tại!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    deleteProduct($id);
    header("Location: product_list.php");
}
?>

<h2>Xóa sản phẩm</h2>
<p>Bạn có chắc chắn muốn xóa sản phẩm: <?= $product['name'] ?> ?</p>
<form method="post">
    <button type="submit">Xóa</button>
    <a href="product_list.php">Hủy</a>
</form>

<?php
require_once "view/footer.php";
?>