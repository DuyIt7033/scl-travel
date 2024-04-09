<?php
include "header.php";
include "class/baiviet_class.php";

$baiviet = new baiviet;
$all_baiviet = $baiviet->show_bv();

$id_baiviet = isset($_GET['id_baiviet']) ? $_GET['id_baiviet'] : null;

$bv_array = array();

if ($all_baiviet && $all_baiviet->num_rows > 0) {
    while ($bv_row = $all_baiviet->fetch_assoc()) {
        // Kiểm tra xem ID bài viết có khác với ID bài viết hiện tại
        if ($bv_row['id_baiviet'] != $id_baiviet) {
            $bv_array[] = $bv_row;
        }
    }
}

if ($id_baiviet) {
    $baiviet = new baiviet();

    $baiviet_info = $baiviet->get_bv($id_baiviet)->fetch_assoc();

    if ($baiviet_info) {
        $id_tinh = $baiviet_info['id_tinh'];
        $tinhthanh = new tinhthanh();
        $tinhthanh_info = $tinhthanh->get_tinhthanh($id_tinh)->fetch_assoc();
?>

        <!-- End header -->
        <div class="baiviet">
            <div class="noidung_chinh">
                <div class="head_ndc">
                    <h1><?php echo $baiviet_info['tieu_de']; ?></h1>
                    <div class="tt_h_ndc">
                        <p class="baiviet_tinh"><i style="margin-right: 5px;" class="fa-solid fa-map-location-dot"></i><?php echo $tinhthanh_info['Ten_tinh']; ?></p>
                        <p class="baiviet_time"><i style="margin-right: 5px;" class="fa-solid fa-calendar-check"></i><?php echo $baiviet_info['publish_date']; ?></p>
                    </div>
                </div>
                <div class="main_ndc">
                    <!-- Nội dung bài viết -->
                    
                    <p><?php echo $baiviet_info['noidung']; ?></p>
                    
                    <div style="width: 100%;" class="mapbv"><?php echo $baiviet_info['map']; ?></div>
                </div>
            </div>
            <hr class="hr_baiviet">

            <div class="goi_y">
            <h2>Có thể quan tâm:</h2>
                <?php

                $count = 0;
                foreach ($bv_array as $bv) {
                    $id_baiviet = $bv['id_baiviet'];
                    $tieu_de = $bv['tieu_de'];
                ?>
                    <div class="contai_g_y">
                        <img src="./admin/uploads/<?php echo $bv['anh_avt_bv']; ?>">
                        <a href="baiviet.php?id_baiviet=<?php echo $id_baiviet; ?>"><?php echo $tieu_de; ?></a>
                    </div>
                <?php
                    $count += 1;
                }

                // Kiểm tra xem có bài viết nào trong mảng không
                if ($count == 0) {
                    echo "Không có bài viết nào!";
                }
                ?>

            </div>
        </div>
        <!-- footer-->
<?php
    } else {

        echo "Bài viết không tồn tại!";
    }
} else {
    echo "Không có ID bài viết được cung cấp!";
}

include "footer.php";
?>