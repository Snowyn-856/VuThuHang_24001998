<?php
session_start();
include 'common/dbConnect.php';
include 'view/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: product_list.php");
            exit();
        } else {
            echo "<p style='color:red'>Sai mật khẩu!</p>";
        }
    } else {
        echo "<p style='color:red'>Tên đăng nhập không tồn tại!</p>";
    }
}
?>

<form method="POST">
    <label>Tên đăng nhập:</label><br>
    <input type="text" name="username"><br>
    <label>Mật khẩu:</label><br>
    <input type="password" name="password"><br>
    <button type="submit">Đăng nhập</button>
</form>

<p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>

<?php include 'view/footer.php'; ?>
