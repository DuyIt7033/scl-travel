<?php
include "header.php";
include "class/baiviet_class.php";
include "class/lienhe_class.php";

$id_tinh = $_GET['id_tinh'];
$tinhthanh = new tinhthanh;
$tinh_info = $tinhthanh->get_tinhthanh($id_tinh);

// Kiểm tra xem có tham số id_tinh được truyền vào không
if (isset($id_tinh)) {
    if ($tinh_info && $tinh_info->num_rows > 0) {
        $row = $tinh_info->fetch_assoc();
        echo '<div class="a_i_title">';
        // Sử dụng đường dẫn tương đối đến thư mục uploads
        echo '<img src="./admin/' . $row['anh_avt_tinh'] . '">';
        echo '<h1>' . $row['Ten_tinh'] . '</h1>';
        echo '</div>';
        echo '<div class="info_tinh_about">';
        echo '<p>' . $row['Mo_ta'] . '</p>';
        echo '</div>';
    } else {
        echo $id_tinh;
        // Hiển thị thông báo nếu không tìm thấy thông tin về tỉnh
        echo "Không tìm thấy thông tin về tỉnh này.";
    }
} else {
    // Hiển thị thông báo nếu không có tham số id_tinh được truyền vào
    echo "Không có id tỉnh được cung cấp.";
}

$baiviet = new baiviet;
$baiviet_list = $baiviet->get_baiviet_by_tinh($id_tinh);

?>

<div class="info_tinh">
    <div class="info_tinh_title">
        <h2>Cẩm nang du lịch tỉnh <?php echo $row['Ten_tinh']; ?></h2>
        <hr>
    </div>
    <div class="info_tinh_cont">

        <?php
        if ($baiviet_list && $baiviet_list->num_rows > 0) {
            while ($bv_row = $baiviet_list->fetch_assoc()) {
                $anh_avt_bv_path = 'admin/uploads/' . $bv_row['anh_avt_bv'];
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
            echo '<div style="display: block;color: red;font-size: 18px; margin: 40px;">Không có bài viết nào phù hợp.</div>';
        }
        ?>



    </div>
    <button style="margin-bottom:10px ;" class="more">Xem thêm</button>
</div>
<!-- <button style="margin-bottom:10px ;" class="more">Xem thêm</button> -->

</div>

<?php
include "footer.php";
?>