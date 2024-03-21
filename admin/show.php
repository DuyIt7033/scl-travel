<?php
// include "header_admin.php";
// include "slider_menu.php";
include "class/baiviet_class.php";

$baiviet = new baiviet;
$baiviet_list = $baiviet->show_bv();
?>

<div class="container">
    <h2>Danh sách bài viết</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Tỉnh</th>
                <th>Loại bài viết</th>
                <th>Nội dung</th>
                <th>Ảnh đại diện</th>
                <th>Ngày đăng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($baiviet_list) {
                while ($row = $baiviet_list->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_baiviet'] . "</td>";
                    echo "<td>" . $row['tieu_de'] . "</td>";
                    echo "<td>" . $row['id_tinh'] . "</td>";
                    echo "<td>" . $row['id_loai'] . "</td>";
                    echo "<td>" . $row['noidung'] . "</td>";
                    echo "<td><img src='" . $row['anh_avt_bv'] . "' width='100' height='100'></td>";
                    echo "<td>" . $row['publish_date'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Không có bài viết nào.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


