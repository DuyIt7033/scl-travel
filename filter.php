<?php
include 'admin/database.php';
include "class/baiviet_class.php";

$baiviet = new baiviet();

// Lấy giá trị của tỉnh thành và dạng bài viết từ yêu cầu POST
$id_tinh = $_POST['id_tinh'];
$id_loai = $_POST['id_loai'];

// Khởi tạo biến để lưu danh sách bài viết
$baiviet_list = null;

// Kiểm tra nếu cả hai giá trị đều là null, hiển thị toàn bộ bài viết
if ($id_tinh === "null" && $id_loai === "null") {
    $baiviet_list = $baiviet->show_bv();
} elseif ($id_tinh !== "null" && $id_loai === "null") {
    // Nếu chỉ có tỉnh được chọn, lọc bài viết theo tỉnh
    $baiviet_list = $baiviet->get_baiviet_by_tinh($id_tinh);
} elseif ($id_loai !== "null" && $id_tinh === "null") {
    // Nếu chỉ có loại bài viết được chọn, lọc bài viết theo loại
    $baiviet_list = $baiviet->get_bv_id_loai_baiviet($id_loai);
} elseif ($id_tinh !== "null" && $id_loai !== "null") {
    // Nếu cả hai giá trị đều được chọn, lọc bài viết theo cả tỉnh và loại
    $baiviet_list = $baiviet->filter_bv_by_location_and_type($id_tinh, $id_loai);
}

// Hiển thị danh sách bài viết
if ($baiviet_list && $baiviet_list->num_rows > 0) {
    while ($bv_row = $baiviet_list->fetch_assoc()) {
        $anh_avt_bv_path = 'admin/uploads/' . $bv_row['anh_avt_bv'];
        echo '<div class="info_tinh_detail">';
        echo '<a href="baiviet.php?id_baiviet=' . $bv_row['id_baiviet'] . '" class="info_tinh_img_de">';
        echo '<img src="' . $anh_avt_bv_path . '" alt="Ảnh đại diện">';
        echo '</a>';
        echo '<div class="info_tinh_d">';
        echo '<h3>' . $bv_row['tieu_de'] . '</h3>';
        echo '<p style="overflow: hidden;">' . $bv_row['mo_ta_ngan'] . '</p>';
        echo '<a href="baiviet.php?id_baiviet=' . $bv_row['id_baiviet'] . '">Xem chi tiết</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Không có bài viết nào phù hợp.";
}
?>
