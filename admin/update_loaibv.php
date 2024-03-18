<?php
include "header_admin.php";
include "slider_menu.php";
include "class/loai_bv_class.php";
?>
<?php
$loaibv = new loaibv;
$show_loaibv = $loaibv->show_loaibv();
?>

<div class="show_tt">
    <h2>Danh sách loại bài viết</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên loại</th>
            <th>Loại bài viết</th>
            <th>Tùy chỉnh</th>
        </tr>
        <?php
        if ($show_loaibv) {
            while ($result = $show_loaibv->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $result['id_loai']; ?></td>
                    <td><?php echo $result['ten_loai']; ?></td>
                    <td><?php echo $result['loai_baiviet']; ?></td>
                    <td class="sua-xoa">
                        <a class="sua" href="./edit_loaibv.php?id_loai=<?php echo $result['id_loai'] ?>">Sửa</a>
                        ||
                        <a class="xoa" href="#" onclick="return confirmDelete(<?php echo $result['id_loai']; ?>)">Xóa</a>
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
            window.location.href = "./delete_loaibv.php?id_loai=" + id;
        } else {
            // Nếu người dùng chọn "Cancel"
            return false;
        }
    }
</script>
</body>

</html>
