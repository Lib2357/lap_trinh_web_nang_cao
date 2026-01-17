<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý danh sách sinh viên</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        .btn { text-decoration: none; padding: 5px 10px; border-radius: 3px; font-size: 13px; }
        .btn-edit { background-color: #ffc107; color: #000; }
        .btn-delete { background-color: #dc3545; color: #fff; }
        .add-link { display: inline-block; margin-bottom: 15px; color: #28a745; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

    <h2>DANH SÁCH SINH VIÊN</h2>
    <a href="add_student.php" class="add-link">+ Thêm sinh viên mới</a>

    <?php
    // 1. Kết nối DB
    require_once 'db_connect.php';

    try {
        // 2. Viết câu lệnh SELECT
        $sql = "SELECT * FROM students ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // 3. Sử dụng fetchAll(PDO::FETCH_ASSOC)
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 4. Đổ dữ liệu ra bảng HTML
        if ($students) {
            echo "<table>";
            echo "<thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Mã SV</th>
                        <th>Email</th>
                        <th>Hành động</th>
                    </tr>
                  </thead>";
            echo "<tbody>";
            
            // Dùng vòng lặp foreach để duyệt qua mảng dữ liệu
            foreach ($students as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['student_code']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                
                // 5. Nâng cao: Thêm cột Hành động
                echo "<td>
                        <a href='edit.php?id=" . $row['id'] . "' class='btn btn-edit'>Sửa</a> 
                        <a href='delete.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Bạn có chắc muốn xóa?\")'>Xóa</a>
                      </td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Chưa có dữ liệu sinh viên nào.</p>";
        }

    } catch (PDOException $e) {
        echo "Lỗi truy vấn: " . $e->getMessage();
    }
    ?>

</body>
</html>