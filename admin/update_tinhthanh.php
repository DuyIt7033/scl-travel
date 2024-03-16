<?php
include "header_admin.php";
include "slider_menu.php";
include "class/tinhthanh_class.php";
?>
<?php
$tinhthanh = new tinhthanh;
$show_tinhthanh = $tinhthanh -> show_tinhthanh();
?>

<div class="show_tt">
    <h2>Danh sách tỉnh thành</h2>        
        <table>
            <tr>
                <th>ID</th>
                <th>Tên Tỉnh</th>
                <th>Ảnh đại diện</th>
                <th>Tùy chỉnh</th>
            </tr>
            <?php
            if ($show_tinhthanh) {
                while ($result = $show_tinhthanh->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $result['id_tinh']; ?></td>
                    <td><?php echo $result['Ten_tinh']; ?></td>
                    <td>
                        <?php
                        $imageData = base64_encode($result['anh_avt_tinh']);
                        $src = 'data:image/jpeg;base64,' . $imageData;
                        ?>
                        <img style="width: auto; height: 100px;" src="<?php echo $src; ?>" alt="">
                    </td>
                    <td class="sua-xoa">
                        <a class="sua" href="./edit_tinhthanh.php?id_tinh=<?php echo $result['id_tinh'] ?>">Sửa</a>
                        ||
                        <a class="xoa" href="#" onclick="return confirmDelete(<?php echo $result['id_tinh']; ?>)">Xóa</a>
                    </td>
                </tr>
            <?php
                }
            }
            ?>      
        </table>
    </div>
</div>

<script>
    function confirmDelete(id) {
        var result = confirm("Bạn có chắc muốn xóa?");
        if (result) {
            // Nếu người dùng chọn "OK"
            window.location.href = "./delete_tinhthanh.php?id_tinh=" + id;
        } else {
            // Nếu người dùng chọn "Cancel"
            return false;
        }
    }
</script>
</body>

</html>