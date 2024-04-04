<?php
include "header.php";
include "class/baiviet_class.php";

$id_tinh = $_GET['id_tinh'];
$tinhthanh = new tinhthanh;
$tinh_info = $tinhthanh->get_tinhthanh($id_tinh);


// Kiểm tra xem có tham số id_tinh được truyền vào không
if (isset($id_tinh)) {
    if ($tinh_info && $tinh_info->num_rows > 0) {
        $row = $tinh_info->fetch_assoc();
        echo '<div class="a_i_title">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['anh_avt_tinh']) . '">';
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




<!-- <img src="./img/Test.png" >
        <h1>Cần Thơ</h1>
    </div>
    <div class="info_tinh_about">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum rerum, nam nulla voluptatum tempora corrupti, non distinctio nesciunt possimus quisquam sunt sed quas dolor? Laudantium beatae doloremque nulla expedita officiis. Lorem ipsum, dolor sit amet consectetur adipisicing elit. A, sed dicta, error ipsum tempore debitis explicabo in harum consequatur adipisci voluptatum deleniti. Dolorum architecto nostrum temporibus officiis corporis accusamus voluptates. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos deserunt laborum fugiat, rerum quisquam sunt voluptatibus nobis natus eos architecto, distinctio corrupti dolores ratione tenetur vitae reiciendis similique inventore cumque! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora sapiente eaque voluptates animi maxime exercitationem magnam in minus dignissimos ipsum dolor fugiat facere nesciunt, minima doloremque delectus aspernatur. Eaque, officiis.</p>
    </div> -->
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
                   <a href="" class="info_tinh_img_de">
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
</div>
<button style="margin-bottom:10px ;" class="more">Xem thêm</button>
</div>

<?php
include "footer.php";
?>