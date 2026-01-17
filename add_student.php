<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh Viên</title>
</head>
<body>
    <h2>Thêm Sinh Viên Mới</h2>
    <form action="" method="POST">
        <input type="text" name="fullname" placeholder="Họ và tên" required><br><br>
        <input type="text" name="student_code" placeholder="Mã sinh viên" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <button type="submit" name="btn_add">Thêm mới</button>
    </form>

    <hr>

    <?php
    // 2. Xử lý khi người dùng nhấn "Thêm mới"
    if (isset($_POST['btn_add'])) {
        // Nhúng file kết nối DB
        require_once 'db_connect.php';

        // Lấy dữ liệu từ $_POST
        $name = $_POST['fullname'];
        $code = $_POST['student_code'];
        $email = $_POST['email'];

        try {
            // Viết câu lệnh INSERT sử dụng Prepared Statement (dùng :param)
            $sql = "INSERT INTO students (fullname, student_code, email) 
                    VALUES (:fullname, :student_code, :email)";
            
            $stmt = $conn->prepare($sql);

            // Gán giá trị vào các tham số (Binding)
            $stmt->bindParam(':fullname', $name);
            $stmt->bindParam(':student_code', $code);
            $stmt->bindParam(':email', $email);

            // Thực thi (execute)
            $stmt->execute();

            echo "<p style='color: green;'>Thêm sinh viên thành công!</p>";

        } catch (PDOException $e) {
            echo "<p style='color: red;'>Lỗi: " . $e->getMessage() . "</p>";
        }
    }
    ?>
</body>
</html>