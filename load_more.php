<?php
include "class/baiviet_class.php";
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$baiviet = new baiviet;
$baiviet_list = $baiviet->show_bv_limit(2, $offset); // Sử dụng hàm show_bv_limit với limit = 2 và offset được truyền từ tham số

if ($baiviet_list && $baiviet_list->num_rows > 0) {
    while ($bv_row = $baiviet_list->fetch_assoc()) {
        $anh_avt_bv_path = 'admin/uploads/' . $bv_row['anh_avt_bv']; 
        // Hiển thị nội dung bài viết
        ?>
        <div class="info_tinh_detail">
            <a href="baiviet.php?id_baiviet=<?php echo $bv_row['id_baiviet']; ?>" class="info_tinh_img_de">
                <img src="<?php echo $anh_avt_bv_path; ?>" alt="Ảnh đại diện">
            </a>
            <div class="info_tinh_d">
                <h3><?php echo $bv_row['tieu_de']; ?></h3>
                <p style="overflow: hidden;"><?php echo $bv_row['mo_ta_ngan']; ?></p>
                <a href="baiviet.php?id_baiviet=<?php echo $bv_row['id_baiviet']; ?>">Xem chi tiết</a>
            </div>
        </div>
        <?php
    }
} else {
    echo ""; // Trả về chuỗi rỗng nếu không có bài viết mới
}
?>
