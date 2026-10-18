<?php
// Header chung cho toàn bộ trang
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<h1>Quản lý giỏ hàng</h1>
<nav>
    <a href="product_list.php">Danh sách sản phẩm</a> |
    <a href="product_add.php">Thêm sản phẩm</a>
    <?php if (isset($_SESSION['username'])): ?>
        <!-- Nếu đã đăng nhập -->
        <span>Xin chào, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></span> |
        <a href="logout.php">Đăng xuất</a>
    <?php else: ?>
        <!-- Nếu chưa đăng nhập -->
        <a href="login.php">Đăng nhập</a> |
        <a href="register.php">Đăng ký</a>
    <?php endif; ?>
</nav>
<hr>