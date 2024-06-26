<?php
include "header.php";
include "class/baiviet_class.php";
include "class/lienhe_class.php";

$baiviet = new baiviet;

$baiviet_list = $baiviet->show_bv_limit(8, 0); // limit = 8 và offset = 0
$show_tinhthanh = $baiviet->show_tinhthanh();
$show_loaibv = $baiviet->show_loaibv();
?>

<div style="margin-top: 100px;" class="info_tinh">
    <div class="info_tinh_title">
        <h2>Cẩm nang du lịch</h2>
        <hr>
    </div>
    <form action="filter.php" method="post" class="loc_bv" >
        <div class="loc-name">Bộ lọc: </div>
        <div class="loc_tinh">

            <select name="id_tinh">
                <option value="null">Chọn tỉnh thành</option>
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
        </div>
        <div class="loc_danhmuc"><select name="id_loai" >
                <option value="null">Chọn dạng bài viết </option>
                <?php
                if ($show_loaibv) {
                    while ($result = $show_loaibv->fetch_assoc()) {
                ?>
                        <option value="<?php echo $result['id_loai'] ?> "><?php echo $result['ten_loai']; ?> - <?php echo $result['loai_baiviet']; ?> </option>

                <?php
                    }
                }
                ?>
            </select></div>
        <button class="locbv" type="submit">Lọc</button>
    </form>
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
            echo "Không có bài viết nào.";
        }
        ?>

    </div>
    <button style="margin-bottom:10px ;" class="more">Xem thêm</button>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var moreButton = document.querySelector(".more");
        var infoTinhCont = document.querySelector(".info_tinh_cont");
        var offset = 8;

        moreButton.addEventListener("click", function() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "load_more.php?offset=" + offset, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    if (response.trim() === "") {
                        moreButton.style.display = "none";
                    } else {
                        infoTinhCont.innerHTML += response;
                        offset += 8;
                    }
                }
            };
            xhr.send();
        });
    });
</script>
<!-- Xử lí filter ajax -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var locForm = document.querySelector(".loc_bv");
        var moreButton = document.querySelector(".more");

        locForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Ngăn chặn gửi yêu cầu HTTP mặc định
            var formData = new FormData(locForm); // Lấy dữ liệu từ form
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "filter.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    document.querySelector(".info_tinh_cont").innerHTML = response; // Cập nhật giao diện người dùng
                }
            };
            xhr.send(formData);
            moreButton.style.display = "none";
        });
    });
</script>
<!-- Xử lí filter ajax -->

<?php
include "footer.php";
?>