<?php
include "header_admin.php";
include "slider_menu.php";
include "class/baiviet_class.php";
?>
<?php
 $baiviet = new baiviet;
 $ds_tinh = new ds_tinh;
?>
<div class="add_bv">
        <form action="add_baiviet.php" method="post" enctype="multipart/form-data">
            <h2>Thêm bài viết</h2>
            <!-- Tiêu đề -->
            <label for="tieude" >Tiêu Đề:</label>
            <input type="text" id="tieude" name="tieude" required autofocus>
    
            <!-- Nội dung -->
            <label for="noidung">Nội Dung:</label>
            <textarea id="noidung" name="noidung" rows="6" style="max-width: 1000px;" required></textarea>
    
            
            <!-- Ngày Viết -->
            <label for="ngayviet">Ngày Viết:</label>
            <input type="date" id="ngayviet" name="ngayviet" required>
    
            <!-- Loại Bài Viết -->
            <label for="loaibaiviet">Loại Bài Viết:</label>
            <select id="loaibaiviet" name="loaibaiviet" required>
                <option value="topdiadiem">Top địa điểm</option>
                <option value="cuthe">Địa điểm cụ thể</option>
            </select>
    
            <!-- Tỉnh Thành -->
            <label for="tinhthanh">Tỉnh Thành:</label>
            <select id="" name="tinhthanh" required>
            <?php
                // Gọi hàm để lấy danh sách tỉnh thành
                $ds_tinh = new TenLopDsTinh(); // Thay thế TenLopDsTinh bằng tên lớp hoặc hàm thực sự của bạn
                $show_tinh = $ds_tinh->show_ds_tinh();

                // Kiểm tra xem có dữ liệu tỉnh thành hay không
                if ($show_tinh) {
                    while ($result = $show_tinh->fetch_assoc()) {
                        $ten_tinh = $result['ten_tinh'];
                        $id_tinh = $result['id_tinh'];
                        echo "<option value=\"$id_tinh\">$ten_tinh</option>";
                    }
                } else {
                    echo "<option value=\"\">Không có dữ liệu tỉnh thành</option>";
                }
                ?>
                <option value="AnGiang">An Giang</option>
                <!-- <option value="BenTre">Bến Tre</option>
                <option value="BacLieu">Bạc Liêu</option>
                <option value="CaMau">Cà Mau</option>
                <option value="CanTho">Cần Thơ</option>
                <option value="DongThap">Đồng Tháp</option>
                <option value="HauGiang">Hậu Giang</option>
                <option value="KienGiang">Kiên Giang</option>
                <option value="LongAn">Long An</option>
                <option value="SocTrang">Sóc Trăng</option>
                <option value="TienGiang">Tiền Giang</option>
                <option value="TraVinh">Trà Vinh</option>
                <option value="VinhLong">Vĩnh Long</option> -->
            </select>
            <!-- Ảnh -->
            <label for="anh_avt_bv">Ảnh Đại Diện:</label>
            <input type="file" name="anh_avt_bv"  required><br>

            <label for="anh">Ảnh :</label>
            <input type="file" name="anh" required multiple><br>
    
            <!-- Nút Submit -->
            <input class="addBV_btn" type="submit">
        </form>
    </div>
</div>
</body>
</html>