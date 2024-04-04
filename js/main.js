const dotItem = document.querySelectorAll(".dot")
const imgContainer = document.querySelector('.aspect-ratio-169')
const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
const imgNumber = imgPosition.length

let index = 0

function slider(index) {
    imgContainer.style.left = "-" + index * 100 + "%"
    const dotActive = document.querySelector('.active')
    dotActive.classList.remove("active")
    dotItem[index].classList.add("active")
}

imgPosition.forEach(function(image, i) {
    image.style.left = i * 100 + "%"
    dotItem[i].addEventListener("click", function() {
        index = i; // Cập nhật giá trị index khi người dùng nhấp vào dot
        slider(index);
    });
});

function imgSlide() {
    index++;
    if (index >= imgNumber) {
        index = 0;
    }
    slider(index);
}

  
  
setInterval(imgSlide, 5000); // Thời gian chuyển đổi ảnh tự động
// Sự kiện click .fa-bars
const menu = document.querySelector(".menu")
const menuButton = document.querySelector(".fa-bars")
menuButton.addEventListener('click', ()=>{
    menu.classList.toggle("menu_open")
})
// Thêm sự kiện click toàn cục để đóng menu khi click ra ngoài menu
document.addEventListener('click', (event) => {
    const isClickInsideMenu = menu.contains(event.target)
    const isClickInsideMenuButton = menuButton.contains(event.target)

    if (!isClickInsideMenu && !isClickInsideMenuButton) {
        menu.classList.remove("menu_open")
    }
})

// Lên đầu trang

var backToTopButton = document.querySelector('.back-to-top');

window.onscroll = function() {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backToTopButton.style.display = 'block';
    } else {
        backToTopButton.style.display = 'none';
    }
}
    function scrollToTop() {
        window.scrollTo({ top: 10, behavior: 'smooth' });
    }

// slider2
document.addEventListener("DOMContentLoaded", function() {
    function moveNext() {
        let slider2 = document.querySelector('.slider2');
        let imageBoxes = document.querySelectorAll('.image-box');

        // Lấy đường dẫn của ảnh từ phần tử đầu tiên
        let firstImageSrc = imageBoxes[1].querySelector('img').src;

        // Thêm lớp zoom-in để áp dụng hiệu ứng phóng to
        slider2.classList.add('zoom-in');

        // Đặt nền mới cho slider2
        slider2.style.backgroundImage = "url('" + firstImageSrc + "')";


        // Di chuyển phần tử đầu tiên vào cuối danh sách
        document.querySelector('.img_box_container').appendChild(imageBoxes[0]);

        // Reset transition và xóa lớp zoom-in sau khi di chuyển và hoàn thành hiệu ứng phóng to
        setTimeout(function() {
            imageBoxes[1].style.transition = "";
            slider2.classList.remove('zoom-in');
        }, 500);
    }



    setInterval(moveNext,5000);
});

