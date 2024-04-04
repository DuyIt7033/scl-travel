<?php
include "header_admin.php";
include "slider_menu.php";
include "class/tinhthanh_class.php";

$tinhthanh = new tinhthanh;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Ten_tinh = $_POST['Ten_tinh'];
    $id_tinh = $_GET['id_tinh']; 

    // Kiểm tra xem người dùng đã chọn tệp ảnh mới hay không
    if (!empty($_FILES['anh_avt_tinh']['name'])) {
        $anh_avt_tinh_tmp = $_FILES['anh_avt_tinh']['tmp_name'];
        if (!empty($anh_avt_tinh_tmp) && file_exists($anh_avt_tinh_tmp)) {
            $anh_avt_tinh = addslashes(file_get_contents($anh_avt_tinh_tmp));
        } else {
        }
    } else {
        // Nếu không có tệp ảnh mới được chọn, giữ nguyên ảnh đã có trong cơ sở dữ liệu
        $get_tinhthanh = $tinhthanh->get_tinhthanh($id_tinh);
        if ($get_tinhthanh) {
            $result = $get_tinhthanh->fetch_assoc();
            $anh_avt_tinh = $result['anh_avt_tinh'];
        }
    }

    $update_tinhthanh = $tinhthanh->update_tinhthanh($Ten_tinh, $anh_avt_tinh, $id_tinh,$Mo_ta);
    if ($update_tinhthanh) {
        // Chuyển hướng sau khi cập nhật thành công
        header("Location: update_tinhthanh.php?id_tinh=$id_tinh&success=1");
        exit();
    } else {
        $message = "Cập nhật thất bại!";
    }
}


if (!isset($_GET['id_tinh']) || empty($_GET['id_tinh'])) {
    echo "<script>window.location = 'update_tinhthanh.php'</script>"; // Chuyển hướng về trang update_tinhthanh.php nếu không có id_tinh
} else {
    $id_tinh = $_GET['id_tinh'];
}

$get_tinhthanh = $tinhthanh->get_tinhthanh($id_tinh);
if ($get_tinhthanh) {
    $result = $get_tinhthanh->fetch_assoc();
}
?>

<div class="them_tt">
    <h2>Chỉnh sửa thông tin tỉnh thành</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="cont_add">
            <div class="ten">
                <p>Tên tỉnh:</p>
                <input type="text" name="Ten_tinh" autofocus required value="<?php echo isset($result['Ten_tinh']) ? $result['Ten_tinh'] : ''; ?>">
            </div>
            <div class="img_t">
                <p>Ảnh đại diện :</p>
                <input type="file" name="anh_avt_tinh" accept="image/*">
            </div>
            
        </div>
        <div class="mota_tinh" >
            <textarea name="Mo_ta" cols="100" rows="10" placeholder="Mô tả về tỉnh"></textarea>
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