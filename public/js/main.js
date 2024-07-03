var swiper = new Swiper(".bg-slider-thumbs", {
    loop: true,
    spaceBetween: 0,
    slidesPerView: 0,
});

const progressCircle = document.querySelector(".autoplay-progress svg");
const progressContent = document.querySelector(".autoplay-progress span");


var swiper2 = new Swiper(".bg-slider", {
    loop: true,
    spaceBetween: 0,
    // autoplay: {
    //     delay: 10000,
    //     disableOnInteraction: false
    // },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    on: {
        autoplayTimeLeft(s, time, progress) {
            progressCircle.style.setProperty("--progress", 1 - progress);
            progressContent.textContent = `${Math.ceil(time / 1000)}`;
        }
    },
    thumbs: {
        swiper: swiper,
    },
});

window.addEventListener("scroll", function () {
    const header = document.querySelector("header");
    header.classList .toggle("sticky", window.scrollY > 0);
});


//Responsive navigation menu toggle
const menuBtn = document.querySelector(".nav-menu-btn");
const closeBtn = document.querySelector(".nav-close-btn");
const navigation = document.querySelector(".navigation");

menuBtn.addEventListener("click",() => {
    navigation.classList.add("active");
})

closeBtn.addEventListener("click", () => {
    navigation.classList.remove("active");
})
