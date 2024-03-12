<?php
include "header_admin.php";
include "slider_menu.php";
?>
<?php
// Kết nối đến MySQL
include 'database.php'; // Điều chỉnh đường dẫn tùy thuộc vào cấu trúc thư mục của bạn

// Xử lý khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $id_tinh = $_POST["id_tinh"];
    $id_dm = $_POST["id_dm"];
    $tieu_de = $_POST["tieu_de"];
    $noi_dung = $_POST["noi_dung"];

    // Định dạng thời gian
    $create_time = date("Y-m-d H:i:s");

    // Xử lý upload ảnh (thay đổi tên trường và thư mục lưu trữ nếu cần)
    $anh_avt_bv = $_FILES["anh_avt_bv"]["name"];
    $anh_1 = $_FILES["anh_1"]["name"];
    $anh_2 = $_FILES["anh_2"]["name"];

    // Đường dẫn thư mục lưu trữ ảnh
    $upload_folder = "uploads/";

    // Di chuyển ảnh tải lên vào thư mục lưu trữ
    move_uploaded_file($_FILES["anh_avt_bv"]["tmp_name"], $upload_folder . $anh_avt_bv);
    move_uploaded_file($_FILES["anh_1"]["tmp_name"], $upload_folder . $anh_1);
    move_uploaded_file($_FILES["anh_2"]["tmp_name"], $upload_folder . $anh_2);

    // Insert dữ liệu vào bảng bai_viet
    $sql = "INSERT INTO bai_viet (id_tinh, id_dm, tieu_de, create_time, noi_dung, anh_avt_bv, anh_1, anh_2)
            VALUES ('$id_tinh', '$id_dm', '$tieu_de', '$create_time', '$noi_dung', '$anh_avt_bv', '$anh_1', '$anh_2')";

    if ($conn->query($sql) === TRUE) {
        echo "Thêm bài viết thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>

    <h2>Thêm Bài Viết</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        
      
        <label for="tieu_de">Tiêu Đề:</label>
        <input type="text" name="tieu_de" required><br>

        <label for="noi_dung">Nội Dung:</label>
        <textarea name="noi_dung" rows="4" required></textarea><br>

        <label for="anh_avt_bv">Ảnh Đại Diện:</label>
        <input type="file" name="anh_avt_bv" accept="image/*" required><br>

        <label for="anh_1">Ảnh 1:</label>
        <input type="file" name="anh_1" accept="image/*" required><br>

        <label for="anh_2">Ảnh 2:</label>
        <input type="file" name="anh_2" accept="image/*" required><br>

        <input type="submit" value="Thêm Bài Viết">
    </form>
</body>
</html>
