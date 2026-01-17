<!DOCTYPE html>
<html>
<head>
    <title>Thực hành Form POST</title>
</head>
<body>
    <h2>Đăng ký tài khoản</h2>
    <form action="" method="POST">
        <input type="text" name="fullname" placeholder="Họ và tên" required><br><br>
        <input type="password" name="password" placeholder="Mật khẩu" required><br><br>
        <button type="submit">Gửi thông tin</button>
    </form>

    <?php
    // Kiểm tra nếu có dữ liệu gửi lên bằng phương thức POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['fullname'];
        $pass = $_POST['password']; // Mật khẩu được nhận nhưng không hiển thị ra

        echo "<h3>Đã nhận thông tin của: " . htmlspecialchars($name) . "</h3>";
    }
    ?>
</body>
</html>