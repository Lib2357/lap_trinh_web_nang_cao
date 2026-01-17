<?php
$host = 'localhost';
$dbname = 'buoi2_php';
$username = 'root';
$password = ''; // Mật khẩu mặc định của XAMPP thường là rỗng

try {
    // 1. Tạo kết nối PDO
    // Thử cố tình đổi $password = '123456'; để xem lỗi ở bước 2
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Thiết lập chế độ lỗi để PDO ném ra Exception khi có vấn đề
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 4. Nếu kết nối thành công
    echo "Kết nối cơ sở dữ liệu thành công!";

} catch (PDOException $e) {
    // 2 & 3. Bắt lỗi và hiển thị thông báo thân thiện
    // Bạn có thể ghi log lỗi kỹ thuật này ra file để kiểm tra sau: $e->getMessage()
    echo "<h3>Hệ thống đang bảo trì, vui lòng quay lại sau.</h3>";
    
    // Lưu ý: Trong thực tế, đừng bao giờ để die($e->getMessage()) trên trang chủ 
    // vì nó sẽ làm lộ thông tin bảo mật (tên database, cấu trúc thư mục...).
}
?>