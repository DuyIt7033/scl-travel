<?php
include "./class/tinhthanh_class.php";
$tinhthanh = new tinhthanh;
$show_tinhthanh = $tinhthanh->show_tinhthanh();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đồng bằng Sông Cửu Long</title>
    <!-- main css -->
    <link rel="stylesheet" href="./css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container__l_menu">
            <div class="logo">
                <a href="index.php">
                    <img src="./img/logo.png" alt="logo">
                </a>
            </div>
            <div class="menu">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a>Tỉnh thành</a>
                    <ul class="tt_menu">
                        <?php
                        if ($show_tinhthanh) {
                            while ($result = $show_tinhthanh->fetch_assoc()) {
                        ?>
                                <li>
                                    <a href="tinhthanh.php?id_tinh=<?php echo $result['id_tinh']; ?>">
                                        <?php echo $result['Ten_tinh']; ?>
                                    </a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>

                </li>
                <li><a href="thongtindulich.php">Thông tin du lịch</a></li>
                <!-- <li><a href="#"></a></li> -->
                <li><a href="gioithieu.php">Giới thiệu</a></li>
                <li><a href="lienhe.php">Liên hệ</a></li>
            </div>
        </div>
        <div class="others">
            <li>
                <input type="text" placeholder="Tìm kiếm" autofocus>
                <i class="fa-solid fa-magnifying-glass"></i>
            </li>
            <div><i class="fa-solid fa-bars"></i></div>
        </div>
    </header>
    <!-- End header -->