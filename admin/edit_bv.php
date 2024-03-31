<?php
include "header_admin.php";
include "slider_menu.php";
include "class/baiviet_class.php";

$baiviet = new baiviet;
$show_tinhthanh = $baiviet -> show_tinhthanh();
$show_loaibv = $baiviet -> show_loaibv();

// Lấy thông tin bài viết dựa trên ID được truyền qua URL
if(isset($_GET['id_baiviet']) && !empty($_GET['id_baiviet'])) {
    $id_baiviet = $_GET['id_baiviet'];
    $get_bv = $baiviet->get_bv($id_baiviet);

    if($get_bv->num_rows > 0) {
        $bv_info = $get_bv->fetch_assoc();
    } else {
        // Nếu không tìm thấy bài viết với ID cụ thể, có thể chuyển hướng hoặc hiển thị thông báo
        echo "Không tìm thấy bài viết!";
        exit;
    }
} else {
    // Nếu không có ID được truyền qua URL, có thể chuyển hướng hoặc hiển thị thông báo
    echo "ID bài viết không hợp lệ!";
    exit;
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Thực hiện cập nhật bài viết
    $update_bv = $baiviet->update_bv($_POST['tieu_de'], $_POST['id_tinh'], $_POST['id_loai'], $_POST['noidung'], $_FILES['anh_avt_bv']['name'], $_POST['publish_date'], $id_baiviet);

    if ($update_bv) {
        // Chuyển hướng sau khi cập nhật thành công
        header("Location: edit_bv.php?id_baiviet=$id_baiviet&success=1");
        exit();
    } else {
        $message = "Cập nhật bài viết thất bại!";
    }
}

// Hiển thị thông báo thành công nếu được chuyển hướng từ POST thành công
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $message = "Cập nhật bài viết thành công!";
}
?>

<div class="them_bv">
    <h2 style="margin-left: 10px;">Sửa bài viết</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="cont1">
            <div class="img_bv">
                <p>Ảnh đại diện:</p>
                <input type="file" name="anh_avt_bv" accept="image/*">

                <!-- Hiển thị ảnh đại diện hiện tại -->
                <?php if(!empty($bv_info['anh_avt_bv'])): ?>
                    <img src="uploads/<?php echo $bv_info['anh_avt_bv']; ?>" alt="Ảnh đại diện" style="width: auto; height: 100px;">
                <?php endif; ?>

                <p>Ảnh mô tả :</p>
                <input type="file" name="anh_baiviet[]" accept="image/*" multiple>
            </div>

            <input class="tieu_de" placeholder="Tiêu đề bài viết" type="text" id="title" name="tieu_de" value="<?php echo $bv_info['tieu_de']; ?>"><br>

            <textarea id="editor1" placeholder="Nội dung bài viết" name="noidung" rows="20" cols="80"><?php echo $bv_info['noidung']; ?></textarea><br>

        </div>
        <hr>
        <div class="cont2">
           <select name = "id_tinh">
                <option >Chọn tỉnh thành</option>
                    <?php
                    if ($show_tinhthanh) {
                        while ($result = $show_tinhthanh->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $result['id_tinh'] ?> "><?php echo $result['Ten_tinh']; ?> </option>
                    
                    <?php
                        }
                    }
                    ?>
            </select>

            <select name="id_loai" required>
                <option >Chọn dạng bài viết </option>
            <?php
                    if ($show_loaibv) {
                        while ($result = $show_loaibv->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $result['id_loai'] ?> "><?php echo $result['ten_loai']; ?> - <?php echo $result['loai_baiviet']; ?> </option>
                    
                    <?php
                        }
                    }
                    ?>
            </select>
            </select><br><br>

            <div>
                <label for="publish_date">Ngày đăng:</label><br>
                <input type="date" name="publish_date" value="<?php echo $bv_info['publish_date']; ?>">
            </div>
            <div class="submit_add_bv">
                <input type="submit" value="Cập nhật bài viết">
            </div>
        </div>
    </form>
</div>

<script>
    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserWindowWidth: '1000',
        filebrowserWindowHeight: '700'
    });

    // Hiển thị thông báo
    window.onload = function () {
        var message = "<?php echo $message; ?>";
        if (message !== "") {
            alert(message);
        }
    }
</script>

