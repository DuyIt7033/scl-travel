<?php
include "class/tinhthanh_class.php";
$tinhthanh = new tinhthanh;

if (!isset($_GET['id_tinh']) || empty($_GET['id_tinh'])){
    echo "<script>window.location = 'update_tinhthanh.php'</script>"; // Chuyển hướng về trang update_tinhthanh.php nếu không có id_tinh
} else {
    $id_tinh = $_GET['id_tinh'];
}

$del_tinhthanh = $tinhthanh->del_tinhthanh($id_tinh);

?>

