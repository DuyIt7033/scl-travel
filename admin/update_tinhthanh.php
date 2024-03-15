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
                    <td><a href="#">Sửa</a></td>
                </tr>
            <?php
                }
            }
            ?>      
        </table>
    </div>
</div>
</body>
</html>