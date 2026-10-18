<?php
include 'common/dbConnect.php';
include 'view/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == '' || $password == '') {
        echo "<p style='color:red'>Tên đăng nhập và mật khẩu không được để trống!</p>";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->rowCount() > 0) {
            echo "<p style='color:red'>Tên đăng nhập đã tồn tại!</p>";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            if ($stmt->execute([$username, $hashedPassword])) {
                // Sau khi đăng ký thành công, chuyển sang login
                header("Location: login.php");
                exit();
            } else {
                echo "<p style='color:red'>Có lỗi xảy ra!</p>";
            }
        }
    }
}
?>

<form method="POST">
    <label>Tên đăng nhập:</label><br>
    <input type="text" name="username"><br>
    <label>Mật khẩu:</label><br>
    <input type="password" name="password"><br>
    <button type="submit">Đăng ký</button>
</form>

<p>Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>

<?php include 'view/footer.php'; ?>
