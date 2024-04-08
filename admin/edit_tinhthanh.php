<?php
include "header_admin.php";
include "slider_menu.php";
include "class/tinhthanh_class.php";

$tinhthanh = new tinhthanh;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Ten_tinh = $_POST['Ten_tinh'];
    $Mo_ta = $_POST['Mo_ta'];
    $anh_avt_tinh = $_FILES['anh_avt_tinh'];
    $id_tinh = $_GET['id_tinh'];

    // Kiểm tra có ảnh mới không
    if (!empty($anh_avt_tinh['name'])) {
        // Xử lý tệp ảnh
        $targetDirectory = "uploads/";
        $anh_avt_tinh_name = basename($anh_avt_tinh["name"]);
        $targetFilePath = $targetDirectory . $anh_avt_tinh_name;

        // Di chuyển ảnh vào thư mục uploads
        if (move_uploaded_file($anh_avt_tinh["tmp_name"], $targetFilePath)) {
            $result = $tinhthanh->update_tinhthanh($Ten_tinh, $targetFilePath, $id_tinh, $Mo_ta);

            if ($result) {
                header("Location: update_tinhthanh.php");
                exit;
            } else {
                echo "Có lỗi xảy ra khi cập nhật thông tin tỉnh thành.";
            }
        } else {
            echo "Có lỗi xảy ra khi tải lên tệp ảnh.";
        }
    } else {
        $result = $tinhthanh->update_tinhthanh($Ten_tinh, null, $id_tinh, $Mo_ta);

        if ($result) {
            header("Location: update_tinhthanh.php");
            exit;
        } else {  
            echo "Có lỗi xảy ra khi cập nhật thông tin tỉnh thành.";
        }
    }
}
?>

<div class="them_tt">
    <h2>Chỉnh sửa thông tin tỉnh thành</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="cont_add">
            <div class="ten">
                <p>Tên tỉnh:</p>
                <input type="text" name="Ten_tinh" autofocus required>
            </div>
            <div class="img_t">
                <p>Ảnh đại diện :</p>
                <input type="file" name="anh_avt_tinh" accept="image/*">
            </div>
        </div>
        <div class="mota_tinh">
            <textarea name="Mo_ta" cols="100" rows="40" placeholder="Mô tả về tỉnh"></textarea>
        </div>
        <div class="add_ttbtn">
            <button type="submit">Cập nhật</button>
        </div>
    </form>
</div>
