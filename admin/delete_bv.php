<?php
include "class/baiviet_class.php";
$baiviet = new baiviet;

if (!isset($_GET['id_baiviet']) || empty($_GET['id_baiviet'])){
    echo "<script>window.location = 'update_bv.php'</script>"; // Chuyển hướng về trang update_bv.php nếu không có id_baiviet
} else {
    $id_baiviet = $_GET['id_baiviet'];
}

$del_bv = $baiviet->del_bv($id_baiviet);
?>
