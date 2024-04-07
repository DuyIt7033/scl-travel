<?php
include "header_admin.php";
include "slider_menu.php";
include "class/tinhthanh_class.php";

$tinhthanh = new tinhthanh;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Ten_tinh = $_POST['Ten_tinh'];
    $Mo_ta = $_POST['Mo_ta'];

    // Kiểm tra xem có tệp ảnh được tải lên không
    if (isset($_FILES['anh_avt_tinh'])) {
        $anh_avt_tinh = $_FILES['anh_avt_tinh'];
    } else {
        $anh_avt_tinh = null;
    }

    // Gọi phương thức insert_tinhthanh với các tham số cần thiết
    $insert_tinhthanh = $tinhthanh->insert_tinhthanh($Ten_tinh, $anh_avt_tinh, $Mo_ta);

    // Kiểm tra kết quả và chuyển hướng
    if ($insert_tinhthanh) {
        header("Location: add_tinhthanh.php?success=1");
        exit();
    } else {
        $message = "Thêm ảnh thất bại!";
    }
}

// Hiển thị thông báo thành công nếu được chuyển hướng từ POST thành công
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $message = "Thêm ảnh thành công!";
}

?>

<div class="them_tt">
    <h2>Thêm tỉnh thành</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="cont_add">
            <div class="ten">
                <p>Tên tỉnh:</p>
                <input type="text" name="Ten_tinh" required autofocus>
            </div>
            <div class="img_t">
                <p>Ảnh đại diện :</p>
                <input type="file" name="anh_avt_tinh" accept="image/*" required>
            </div>
        </div>
        <div class="mota_tinh" >
            <textarea name="Mo_ta" cols="100" rows="10" placeholder="Mô tả về tỉnh"></textarea>
        </div>
        <div class="add_ttbtn">
            <button type="submit">
                Thêm
            </button>
        </div>
    </form>
</div>
</div>
</body>
</html>
