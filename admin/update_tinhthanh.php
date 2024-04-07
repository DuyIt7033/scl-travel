<?php
include "header_admin.php";
include "slider_menu.php";
include "class/tinhthanh_class.php";

$tinhthanh = new tinhthanh;
$show_tinhthanh = $tinhthanh->show_tinhthanh();
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
                $anh_avt_tinh_path = $result['anh_avt_tinh']; // Đường dẫn đến tệp ảnh
        ?>
                <tr>
                    <td><?php echo $result['id_tinh']; ?></td>
                    <td><?php echo $result['Ten_tinh']; ?></td>
                    <td><img src="<?php echo $anh_avt_tinh_path; ?>" alt="Ảnh đại diện" style="width: auto; height: 100px;"></td> <!-- Hiển thị hình ảnh -->
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