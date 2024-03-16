<?php
include "header_admin.php";
include "slider_menu.php";
include "class/tinhthanh_class.php";

$tinhthanh = new tinhthanh;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Ten_tinh = $_POST['Ten_tinh'];
    $id_tinh = $_GET['id_tinh']; // Lấy id_tinh từ query string

    $update_tinhthanh = $tinhthanh->update_tinhthanh($Ten_tinh, $id_tinh);
    
}
?>

<?php
if (!isset($_GET['id_tinh']) || empty($_GET['id_tinh'])){
    echo "<script>window.location = 'update_tinhthanh.php'</script>"; // Chuyển hướng về trang update_tinhthanh.php nếu không có id_tinh
}else{
    $id_tinh = $_GET['id_tinh'];
}
$get_tinhthanh  = $tinhthanh->get_tinhthanh($id_tinh);
if($get_tinhthanh){
    $result = $get_tinhthanh->fetch_assoc();
}
?>

<div class="them_tt">
    <h2>Chỉnh sửa thông tin tỉnh thành</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="cont_add">
            <div class="ten">
                <p>Tên tỉnh:</p>
                <input type="text" name="Ten_tinh" required autofocus value="<?php echo isset($result['Ten_tinh']) ? $result['Ten_tinh'] : ''; ?>"> <!-- Hiển thị giá trị cũ của Ten_tinh -->
            </div>
            <div class="img_t">
                <p>Ảnh đại diện :</p>
                <input type="file" name="anh_avt_tinh" accept="image/*" >
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
