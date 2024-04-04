<?php
include "header.php";
include "class/lienhe_class.php";

$lienhe = new lienhe();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $insert_lh = $lienhe->insert_lh($_POST);
}


?>
<!-- End header -->
<div class="a_i_title">
    <img src="./img/bentre.jpg">
    <h1>Liên hệ viết bài</h1>
</div>
<div class="info_tinh_about">
    <p>SCL Travel là trang web đóng vai trò trung gian kết nối người dùng với các dịch vụ du lịch uy tín tại khu vực Đồng bằng sông Cửu Long (ĐBSCL). Chúng tôi cung cấp cho bạn một nền tảng trực tuyến dễ dàng sử dụng để tìm kiếm, so sánh và đặt các dịch vụ du lịch phù hợp với nhu cầu của bạn.
        Mục tiêu của SCL Travel là mang đến cho người dùng trải nghiệm du lịch tốt nhất tại ĐBSCL.
        Giúp các nhà cung cấp dịch vụ du lịch quảng bá dịch vụ của mình đến khách hàng tiềm năng.
        Góp phần thúc đẩy ngành du lịch ĐBSCL phát triển.


        <br><br><strong style="font-size: 14px; color:#FAA719;">Bạn muốn giới thiệu dịch vụ của mình đến người dùng? <br>
            Hãy điền thông tin vào form đăng ký bên dưới để trở thành đối tác của <strong style="color: #00B6BE;" >SCL-travel</strong> ngay hôm nay.</strong> </n>
    </p>

</div>
<div class="lienhe">
    <div class="info_web">
        <div class="info_child">
            <div class="phone_number">
                <i class="fa-solid fa-square-phone"></i>
                <div class="contai-temp">
                    <p>Hotline:</p>
                    <p><b>0123222444</b></p>
                </div>
            </div>
            <div class="web_mail">
                <i class="fa-solid fa-envelope-open"></i>
                <div class="contai-temp">
                    <p>Email:</p>
                    <p><b>scl-travel@gmail.com</b></p>
                </div>
            </div>
        </div>
        <div class="register_contactForm">
            <form method="POST" enctype="multipart/form-data">
                <label for="fullName">Tên doanh nghiệp:</label>
                <input type="text" id="" name="fullName" required autofocus>

                <label for="phoneNumber">Số Điện Thoại:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" required title="Vui lòng nhập đúng 10 số">

                <label for="email-lh">Email:</label>
                <input type="emaillh" id="email-lh" name="emaillh" required>

                <label for="morett">Câu hỏi hoặc thông tin:</label>
                <textarea placeholder="Liên hệ để quảng cáo cho doanh nghiệp..." name="morett" id="" cols="30" rows="5" required></textarea>

                <button type="submit"> <b>GỬI</b> </button>
            </form>
        </div>
    </div>
    <div class="map">
        <div class="locate_map">
            <div class="locate">
                <i class="fa-solid fa-building"></i>
                <div class="contai-temp">
                    <p>Địa chỉ:</p>
                    <p><b>Vincom Plaza Xuân Khánh
                            209 Đ. 30 Tháng 4, Xuân Khánh, Ninh Kiều, Cần Thơ</b></p>
                </div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.9048208849413!2d105.77235427491105!3d10.02471277260923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08820e288dc5b%3A0x301560920bedaf72!2sVincom%20Plaza%20Xu%C3%A2n%20Kh%C3%A1nh!5e0!3m2!1svi!2s!4v1706695980047!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
<!-- footer-->
<?php
include "footer.php";

?>