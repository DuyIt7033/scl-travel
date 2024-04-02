
<?php
$baiviet= new baiviet;

$show_tinhthanh = $baiviet -> show_tinhthanh();
$show_loaibv = $baiviet -> show_loaibv();

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $insert_bv = $baiviet->insert_bv($_POST, $_FILES);

    if ($insert_bv) {
        // Chuyển hướng sau khi thêm thành công, sử dụng phương thức GET
        header("Location: add_bv.php?success=1");
        exit(); // Dừng việc thực thi mã sau khi chuyển hướng
    } else {
        $message = "Thêm bài viết thất bại!";
    }
}

// Hiển thị thông báo thành công nếu được chuyển hướng từ POST thành công
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $message = "Thêm bài viết thành công!";
}
?>


<div class="them_bv">
    <h2 style="margin-left: 10px;">Thêm bài viết</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="cont1">
        <div class="img_bv">
                <p>Ảnh đại diện:</p>
                <input type="file" name="anh_avt_bv" accept="image/*" required>

                <p>Ảnh mô tả :</p>
                <input type="file" name="anh_baiviet[]" accept="image/*" multiple>
            </div>

            <input class="tieu_de" placeholder="Tiêu đề bài viết" type="text" id="title" name="tieu_de" required><br>


            <textarea id="editor1" placeholder="Nội dung bài viết"  name="noidung" rows="20" cols="80" required></textarea><br>

            

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
                <br>
                <input type="date" name="publish_date" required><br>
            </div>
            <div class="submit_add_bv">
                <input type="submit" value="Thêm bài viết">
            </div>
        </div>
    </form>
</div>
</body>


<script>
    CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
} );

</script>
<script>
window.onload = function() {
    var message = "<?php echo $message; ?>";
    if (message !== "") {
        alert(message);
        var message = ""; 
    }
}
</script>


</html>