<?php
include "header_admin.php";
include "slider_menu.php";
include "class/loai_bv_class.php";

$loaibv = new loaibv;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten_loai = $_POST['ten_loai'];
    $id_loai = $_GET['id_loai']; 

    // Kiểm tra xem người dùng đã chọn loại bài viết mới hay không
    $loai_baiviet = $_POST['loai_baiviet'];

    // Thực hiện cập nhật loại bài viết vào cơ sở dữ liệu
    $update_loaibv = $loaibv->update_loaibv($ten_loai, $loai_baiviet, $id_loai);

    if ($update_loaibv) {
        // Chuyển hướng sau khi cập nhật thành công, sử dụng phương thức GET
        header("Location: update_loaibv.php?id_loai=$id_loai&success=1");
        exit(); // Dừng việc thực thi mã sau khi chuyển hướng
    } else {
        $message = "Cập nhật loại bài viết thất bại!";
    }
}

// Kiểm tra xem id_loai có tồn tại hay không
if (!isset($_GET['id_loai']) || empty($_GET['id_loai'])) {
    echo "<script>window.location = 'update_loaibv.php'</script>"; // Chuyển hướng về trang update_baiviet.php nếu không có id_loai
} else {
    $id_loai = $_GET['id_loai'];
}

// Lấy thông tin loại bài viết từ cơ sở dữ liệu
$get_loaibv = $loaibv->get_loaibv($id_loai);
if ($get_loaibv) {
    $result = $get_loaibv->fetch_assoc();
}
?>

<div class="them_tt">
    <h2>Chỉnh sửa thông tin loại bài viết</h2>
    <form method="POST">
        <div class="cont_add">
            <div class="ten">
                <p>Tên loại bài viết:</p>
                 <!-- Hiển thị giá trị cũ của ten_loai -->
                 <select class="add_lbv" name="ten_loai" required>
                    <option value="">Chọn loại bài viết</option>
                    <option value="Địa điểm du lịch" <?php if(isset($result['loai_baiviet']) && $result['loai_baiviet'] == 'summany') echo 'selected'; ?>>Địa điểm du lịch</option>
                    <option value="Ẩm thực" <?php if(isset($result['loai_baiviet']) && $result['loai_baiviet'] == 'Chi tiết') echo 'selected'; ?>>Ẩm thực</option>
                    <option value="Văn hóa lễ hội" <?php if(isset($result['loai_baiviet']) && $result['loai_baiviet'] == 'Chi tiết') echo 'selected'; ?>>Văn hóa lễ hội</option>
                </select>
            </div>
            <div class="loai_baiviet">
                <p>Loại bài viết:</p>
                <select name="loai_baiviet" required>
                    <option value="">Chọn loại bài viết</option>
                    <option value="Tổng hợp" <?php if(isset($result['loai_baiviet']) && $result['loai_baiviet'] == 'Tổng hợp') echo 'selected'; ?>>Tổng hợp</option>
                    <option value="Chi tiết" <?php if(isset($result['loai_baiviet']) && $result['loai_baiviet'] == 'Chi tiết') echo 'selected'; ?>>Chi tiết</option>
                </select>
            </div>
        </div>
        <div class="add_ttbtn">
            <button type="submit">
                Cập nhật
            </button>
        </div>
    </form>
</div>
</div>
</body>
</html>
