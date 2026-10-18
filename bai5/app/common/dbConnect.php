<?php
    $serverName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "shopping_cart";

    try {
        // DSN không có dấu cách quanh dấu =
        $dsn = "mysql:host=$serverName;dbname=$dbName;charset=utf8mb4";
        
        $conn = new PDO($dsn, $dbUserName, $dbPassword);
        
        // Thiết lập chế độ báo lỗi
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //ATTR_DEFAULT_FETCH_MODE
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        echo "Kết nối thành công!";
    } catch (PDOException $e) {
        echo "Lỗi kết nối cơ sở dữ liệu.<br>" . $e->getMessage();
        exit();
    }
?>
