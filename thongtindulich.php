<?php
include "header.php"; 
include "class/baiviet_class.php";
include "class/lienhe_class.php";

$baiviet = new baiviet;

$baiviet_list = $baiviet->show_bv_limit(4, 0); // Sử dụng hàm show_bv_limit với limit = 4 và offset = 0

?>

<div style="margin-top: 100px;" class="info_tinh" >
    <div class="info_tinh_title">
        <h2>Cẩm nang du lịch</h2>
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
                       <p style="overflow: hidden;" ><?php echo $bv_row['mo_ta_ngan']; ?></p>
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
    var offset = 4;

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
                    offset += 2;
                }
            }
        };
        xhr.send();
    });
});
</script>
<?php
include "footer.php"; 
?>
