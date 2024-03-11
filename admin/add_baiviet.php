<?php
include "header_admin.php";
include "slider_menu.php";
?>
<div class="add_bv">
        <form action="add_baiviet.php" method="post" enctype="multipart/form-data">
            <!-- Tiêu đề -->
            <label for="tieude" >Tiêu Đề:</label>
            <input type="text" id="tieude" name="tieude" required autofocus>
    
            <!-- Nội dung -->
            <label for="noidung">Nội Dung:</label>
            <textarea id="noidung" name="noidung" rows="6" style="max-width: 1000px;" required></textarea>
    
            <!-- Ảnh -->
            <label for="anh">Ảnh:</label>
            <input type="file" id="anh" name="anh" accept="image/*" required>
    
            <!-- Ngày Viết -->
            <label for="ngayviet">Ngày Viết:</label>
            <input type="date" id="ngayviet" name="ngayviet" required>
    
            <!-- Loại Bài Viết -->
            <label for="loaibaiviet">Loại Bài Viết:</label>
            <select id="loaibaiviet" name="loaibaiviet" required>
                <option value="amthuc">Ẩm Thực</option>
                <option value="dulich">Địa Điểm Du Lịch</option>
            </select>
    
            <!-- Tỉnh Thành -->
            <label for="tinhthanh">Tỉnh Thành:</label>
            <select id="tinhthanh" name="tinhthanh" required>
                <option value="AnGiang">An Giang</option>
                <option value="BenTre">Bến Tre</option>
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
                <option value="VinhLong">Vĩnh Long</option>

            </select>
    
            <!-- Nút Submit -->
            <input class="addBV_btn" type="submit" value="Thêm">
        </form>
    </div>
</div>
</body>
</html>