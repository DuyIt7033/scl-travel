<?php
include "header.php";
include "class/baiviet_class.php";

$baiviet = new baiviet;
$baiviet_list = $baiviet->show_bv(); // Không cần truyền bất kỳ điều kiện nào vào đây

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

<?php
include "footer.php";
?>
