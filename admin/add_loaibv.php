<?php
include "header_admin.php";
include "slider_menu.php";
include "class/loai_bv_class.php";

$loaibv = new loaibv;
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten_loai = $_POST['ten_loai']; // Lấy tên loại bài viết từ form
    $loai_baiviet = $_POST['loai_baiviet']; // Lấy loại bài viết từ form

    // Thêm dữ liệu về loại bài viết vào cơ sở dữ liệu
    $insert_loaibv = $loaibv->insert_loaibv($ten_loai, $loai_baiviet);

    if ($insert_loaibv) {
        // Chuyển hướng sau khi thêm thành công, sử dụng phương thức GET
        header("Location: add_loaibv.php?success=1");
        exit(); // Dừng việc thực thi mã sau khi chuyển hướng
    } else {
        $message = "Thêm loại bài viết thất bại!";
    }
}

// Hiển thị thông báo thành công nếu được chuyển hướng từ POST thành công
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $message = "Thêm loại bài viết thành công!";
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
    <h2>Thêm loại bài viết</h2>
    <form method="POST">
        <div class="cont_add">
            <div class="ten_loai">
                <p>Tên loại bài viết:</p>
                <select class="add_lbv" name="ten_loai" required>
                    <option value="Dl">Đia điểm du lịch</option>
                    <option value="At">Ẩm thực</option>
                    <option value="lh">Văn hóa lễ hội</option>
                </select>
            </div>
            <div class="loai_baiviet">
                <p>Loại bài viết:</p>
                <select class="add_lbv" name="loai_baiviet" required>
                    <option value="Summary">Tổng hợp</option>
                    <option value="deltail">Chi tiết</option>
                </select>
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
