<?php
include "class/loai_bv_class.php";
$loaibv = new loaibv;

if (!isset($_GET['id_loai']) || empty($_GET['id_loai'])){
    echo "<script>window.location = 'update_loaibv.php'</script>"; 
} else {
    $id_loai = $_GET['id_loai'];
}

$del_loaibv = $loaibv->del_loaibv($id_loai);
?>
