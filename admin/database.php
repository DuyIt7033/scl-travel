<?php
// Thông tin kết nối đến MySQL
$servername = "localhost"; // Thay đổi nếu cần thiết
$username = "root";
$password = "";
$database = "scl"; // Tên của cơ sở dữ liệu

// Tạo kết nối đến MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến MySQL thất bại: " . $conn->connect_error);
}

// Nếu bạn muốn sử dụng kết nối này trong các file khác, bạn có thể sử dụng session hoặc biến toàn cục.

// Mã PHP khác nếu cần thiết...

// Đóng kết nối sau khi sử dụng
$conn->close();
?>
