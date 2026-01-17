<!DOCTYPE html>
<html>
<head>
    <title>Thực hành Form GET</title>
</head>
<body>
    <h2>Tìm kiếm sinh viên</h2>
    <form action="" method="GET">
        <input type="text" name="keyword" placeholder="Nhập từ khóa...">
        <button type="submit">Tìm kiếm</button>
    </form>

    <?php
    // Kiểm tra nếu người dùng đã nhấn Submit (có tham số keyword trên URL)
    if (isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        echo "<h3>Bạn đang tìm kiếm từ khóa: " . htmlspecialchars($keyword) . "</h3>";
    }
    ?>
</body>
</html>