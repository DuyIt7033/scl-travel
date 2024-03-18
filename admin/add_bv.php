<?php
include "header_admin.php";
include "slider_menu.php";
?>

<div class="them_bv">
    <h2 style="margin-left: 10px;">Thêm bài viết mới</h2>
    <form action="#" method="POST">
        <div class="cont1">
            <input class="tieu_de" placeholder="Tiêu đề bài viết" type="text" id="title" name="title" required><br>


            <textarea placeholder="Nội dung bài viết" id="editor1" name="content" rows="20" cols="80" required></textarea><br>

            <div class="img_bv">
                <p>Ảnh đại diện:</p>
                <input type="file" name="anh_avt_bv" accept="image/*" required>

                <p>Ảnh mô tả bài viết :</p>
                <input type="file" name="anh_bv" accept="image/*" multiple>
            </div>


        </div>
        <hr>
        <div class="cont2">
            <select>
                <option value=""> An Giang</option>
                <option value=""> An Giang</option>
                <option value=""> An Giang</option>
                <option value=""> An Giang</option>
                <option value=""> An Giang</option>
                <option value=""> An Giang</option>
                <option value=""> An Giang</option>
            </select>

            <select id="" name="" required>
                <option value="">Ẩm thực</option>
                <option value="">Du lịch</option>
                <!-- Thêm các loại bài viết khác tại đây nếu cần -->
            </select>

            <select id="post_type" name="post_type" required>
                <option value="">Bài viết tổng hợp</option>
                <option value="">Bài viết chi tiết</option>
                <!-- Thêm các loại bài viết khác tại đây nếu cần -->
            </select><br><br>

            <div>
                <label for="publish_date">Ngày đăng:</label><br>
                <br>
                <input type="date" id="publish_date" name="publish_date" required><br>
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

</html>