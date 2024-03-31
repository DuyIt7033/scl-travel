<?php
include "header_admin.php";
include "slider_menu.php";
include "class/baiviet_class.php";
?>

<?php
$baiviet = new baiviet;
$show_baiviet = $baiviet->show_bv(); // Thực hiện truy vấn để lấy danh sách bài viết
?>

<div class="show_tt">
    <h2>Danh sách bài viết</h2>        
    <table>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Ảnh đại diện</th>
            <th>Tùy chỉnh</th>
        </tr>
        <?php
        if ($show_baiviet) {
            while ($result = $show_baiviet->fetch_assoc()) {
                $anh_avt_bv_path = 'uploads/' . $result['anh_avt_bv']; // Đường dẫn đến tệp ảnh
        ?>
                <tr>
                    <td><?php echo $result['id_baiviet']; ?></td>
                    <td ><strong ><?php echo $result['tieu_de']; ?></strong></td>
                    <td><img src="<?php echo $anh_avt_bv_path; ?>" alt="Ảnh đại diện" style="width: auto; height: 100px;"></td> <!-- Hiển thị hình ảnh -->
                    <td class="sua-xoa">
                        <a class="sua" href="./edit_bv.php?id_baiviet=<?php echo $result['id_baiviet'] ?>">Sửa</a>
                        ||
                        <a class="xoa" href="#" onclick="return confirmDelete(<?php echo $result['id_baiviet']; ?>)">Xóa</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>      
    </table>
</div>

<script>
    function confirmDelete(id) {
        var result = confirm("Bạn có chắc muốn xóa?");
        if (result) {
            // Nếu người dùng chọn "OK"
            window.location.href = "./delete_bv.php?id_baiviet=" + id;
        } else {
            // Nếu người dùng chọn "Cancel"
            return false;
        }
    }
</script>

</body>
</html>
