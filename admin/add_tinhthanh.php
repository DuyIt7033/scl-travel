<?php
include "header_admin.php";
include "slider_menu.php";
include "class/tinhthanh_class.php";

$tinhthanh = new tinhthanh;
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Ten_tinh = $_POST['Ten_tinh'];

    if (isset($_FILES['anh_avt_tinh'])) {
        $anh_avt_tinh = $_FILES['anh_avt_tinh']['tmp_name'];
        $imageData = file_get_contents($anh_avt_tinh);
    }

    $insert_tinhthanh = $tinhthanh->insert_tinhthanh($Ten_tinh, $imageData);
    if ($insert_tinhthanh) {
        // Chuyển hướng sau khi thêm thành công, sử dụng phương thức GET
        header("Location: add_tinhthanh.php?success=1");
        exit(); // Dừng việc thực thi mã sau khi chuyển hướng
    } else {
        $message = "Thêm ảnh thất bại!";
    }
}

// Hiển thị thông báo thành công nếu được chuyển hướng từ POST thành công
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $message = "Thêm ảnh thành công!";
    
}
?>

<script>
window.onload = function() {
    var message = "<?php echo $message; ?>";
    if (message !== "") {
        alert(message);
        var message = ""; 
    }
}
</script>

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
