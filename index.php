<?php
include "header.php";
include "class/baiviet_class.php";
include "class/lienhe_class.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lienhe = new lienhe_class();
    $lienhe->insert_lh_one($_POST);
}


$baiviet = new baiviet;

$loai_baiviet_tonghop = "Summary";
$loai_baiviet_chitiet = "detail";

$get_bv_loai_bvth = $baiviet->get_bv_loai_baiviet($loai_baiviet_tonghop);
$get_bv_loai_bvct = $baiviet->get_bv_loai_baiviet($loai_baiviet_chitiet);

$bv_arrayth = array();
if ($get_bv_loai_bvth && $get_bv_loai_bvth->num_rows > 0) {
    while ($bv_rowth = $get_bv_loai_bvth->fetch_assoc()) {
        $bv_arrayth[] = $bv_rowth;
    }
}
$bv_arrayct = array();
if ($get_bv_loai_bvct && $get_bv_loai_bvct->num_rows > 0) {
    while ($bv_rowct = $get_bv_loai_bvct->fetch_assoc()) {
        $bv_arrayct[] = $bv_rowct;
    }
}

$tinhthanh = new tinhthanh;

$show_tinhthanh = $tinhthanh->show_tinhthanh();
if ($show_tinhthanh && $show_tinhthanh->num_rows > 0) {
    while ($tt_row = $show_tinhthanh->fetch_assoc()) {
        $tt_array[] = $tt_row;
    }
}


?>
<!-- contai1 -->
<section id="slider">
    <div class="container_2">
        <div class="aspect-ratio-169">
            <img src="./img/slider1.jpg">
            <img src="./img/slider2.png">
            <img src="./img/slider3.png">
            <img src="./img/slider4.jpg">
            <img src="./img/slider5.png">
        </div>
        <h2 class="welcome">Chào mừng đến với Đồng Bằng Sông Cửu Long</h2>
    </div>
    <div class="dot_container">
        <div class="dot active"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>

    </div>

    <!-- <h2>Địa chỉ</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3915.9313668976943!2d106.63206727492138!3d11.043772654205789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174d10ed848425b%3A0x91bad64c857b077f!2zS2h1IGR1IGzhu4tjaCDEkOG6oWkgTmFt!5e0!3m2!1svi!2s!4v1704807115146!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
</section>
<!-- End contai1 -->
<!-- contai2 -->
<div class="about">
    <div class="about_container">
        <hr class="dot-image">
        <h1>Đôi nét sơ bộ</h1>
        <li>
            Đồng bằng sông Cửu Long là vùng cực nam của Việt Nam, bao gồm 1 thành phố trực thuộc trung ương là Cần Thơ và 12 tỉnh.
            Đồng bằng sông Cửu Long là một vùng châu thổ rộng lớn, được bồi đắp bởi phù sa của sông Mê Kông. Vùng đất này có khí hậu nhiệt đới gió mùa, nóng ẩm quanh năm.
            Về kinh tế, Đồng bằng sông Cửu Long là vùng trọng điểm về nông nghiệp của Việt Nam, với thế mạnh về sản xuất lúa gạo, trái cây, thủy sản. Với những cảnh quan thiên nhiên tươi đẹp, những di tích lịch sử văn hóa đặc sắc và những nét văn hóa độc đáo của người dân địa phương khi du lịch đến các tỉnh thuộc Đồng bằng sông Cửu Long, du khách sẽ được hòa mình vào thiên nhiên sông nước mênh mông. Với hệ thống sông ngòi dày đặc, những cánh đồng lúa xanh mướt, những vườn cây trái trĩu quả, du khách sẽ được tận hưởng cảm giác thư thái, bình yên khi hòa mình vào thiên nhiên tươi đẹp nơi đây.
            Thưởng thức những món ăn ngon. Đồng bằng sông Cửu Long là vùng đất có nền ẩm thực phong phú, với những món ăn đặc trưng như: lẩu mắm, bún mắm, cá lóc nướng trui, bánh xèo, bánh tét lá cẩm,... Những món ăn này được chế biến từ những nguyên liệu tươi ngon, mang đậm hương vị của vùng sông nước miền Tây.
            Ghé thăm những di tích lịch sử văn hóa nổi tiếng như: Chùa Dơi, Chùa Ông, Lăng Ông Thoại Ngọc Hầu, Nhà cổ Huỳnh Thủy Lê,...
            Tìm hiểu về văn hóa của người dân địa phương với sự thân thiện, hiếu khách. Du khách sẽ được tìm hiểu về những phong tục tập quán, những lễ hội đặc sắc của người dân nơi đây.
        </li>
    </div>
</div>
<!-- End contai2 -->
<!-- Contai3 -->
<div class="slider2">
    <div class="good_about">
        <hr>
        <h2>Tỉnh thành nổi bật</h2>
        <p> Bắt đầu chuyến hành trình chinh phục thế giới của bạn và khám phá những địa danh nổi tiếng</p>

    </div>
    <div class="img_box_container">
        <?php
       if (!empty($tt_array)) {
        $count = 0; // Biến đếm số lượng phần tử đã hiển thị
        foreach ($tt_array as $tt_item) {
            if ($count >= 6) break; // Nếu đã hiển thị đủ 6 phần tử thì thoát khỏi vòng lặp
            $id_tinh = $tt_item['id_tinh'];
            $Ten_tinh = $tt_item['Ten_tinh'];
            $anh_avt_tinh = $tt_item['anh_avt_tinh'];
            $image_src = 'admin/' . $anh_avt_tinh; // Đường dẫn đến thư mục uploads
            ?>
            <a href="tinhthanh.php?id_tinh=<?php echo $id_tinh; ?>" class="image-box">
                <h2><?php echo $Ten_tinh; ?></h2>
                <img src="<?php echo $image_src; ?>">
            </a>
            <?php
            $count++; // Tăng biến đếm
        }
    }?>
    
    </div>

</div>
<!-- End Contai3 -->
<!-- Contai4 -->

<div class="info_tralvel">
    <div class="info_head">
        <hr>
        <h2>Tổng hợp cẩm nang du lịch</h2>
    </div>
    <div class="info_body">
        <?php
        if (is_array($bv_arrayth) && !empty($bv_arrayth)) {
            $count = 0; // Đếm số bài viết hiển thị
            foreach ($bv_arrayth as $bv_rowth) {
                if ($count >= 4) break;
                $anh_avt_bv_path = 'admin/uploads/' . $bv_rowth['anh_avt_bv'];
        ?>
                <div class="detail">
                    <a href="baiviet.php?id_baiviet=<?php echo $bv_rowth['id_baiviet']; ?>" class="img_de">
                        <img src="<?php echo $anh_avt_bv_path; ?>">
                    </a>
                    <div class="info_img_d">
                        <h3><?php echo $bv_rowth['tieu_de']; ?></h3>
                        <p style="overflow: hidden;"><?php echo $bv_rowth['mo_ta_ngan']; ?></p>
                        <a href="baiviet.php?id_baiviet=<?php echo $bv_rowth['id_baiviet']; ?>">Xem chi tiết</a>
                    </div>
                </div>
        <?php
                $count++; // Tăng biến đếm
            }
        }
        ?>

    </div>
    <div class="see_all">
        <a href="thongtindulich.php">Xem tất cả <i class="fa-solid fa-angles-right"></i></a>
    </div>

</div>
<!-- End Contai4 -->
<!-- contai5 -->

<div class="review">
    <div class="title_re">
        <hr class="start_re">
        <h2>Đánh giá </h2>
        <p>Tổng hợp thông tin chi tiết</p>
    </div>
    <div class="title_re_row">
        <h3>Bài viết đánh giá </h3>
        <hr>
        <a href="thongtindulich.php"> Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="body_re">
        <div class="body_re_info">
            <h3>Tổng hợp kinh nghiêm du lịch tại các điểm đến</h3>
            <p>Chúc bạn tìm được nhiều niềm vui</p>
        </div>
        <div class="body_re_details">
            <?php
            if (is_array($bv_arrayct) && !empty($bv_arrayct)) {
                $count = 0; // Biến đếm số bài viết đã hiển thị
                foreach ($bv_arrayct as $bv_rowct) {
                    if ($count >= 8) break;
                    $anh_avt_bv_path = 'admin/uploads/' . $bv_rowct['anh_avt_bv'];
            ?>
                    <div class="body_re_details_cont">
                        <a href="baiviet.php?id_baiviet=<?php echo $bv_rowct['id_baiviet']; ?>">
                            <img src="<?php echo $anh_avt_bv_path; ?>">
                        </a>
                        <h2 style="white-space: nowrap;font-size: 14px;overflow: hidden; text-overflow: ellipsis;"><?php echo $bv_rowct['tieu_de']; ?></h2>
                        <p ><?php echo $bv_rowct['mo_ta_ngan']; ?></p>

                    </div>
            <?php
                    $count++; // Tăng biến đếm
                }
            }
            ?>
        </div>
    </div>

</div>
<!-- End contai5 -->

<?php
include "footer.php";
?>