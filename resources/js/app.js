import Swiper from "swiper";
import "swiper/css";
import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import PerfectScrollbar from "perfect-scrollbar";

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 32,
    loop: false,
    centeredSlides: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 2000,
        disableOnInteraction: false,
    },
    breakpoints: {
        640: { slidesPerView: 1, spaceBetween: 32 },
        768: { slidesPerView: 2, spaceBetween: 32 },
        1024: { slidesPerView: 3, spaceBetween: 32 },
    },
});

window.PerfectScrollbar = PerfectScrollbar;

document.addEventListener('alpine:init', () => {
    Alpine.data('mainState', () => {
        let lastScrollTop = 0;
        const init = function () {
            window.addEventListener('scroll', () => {
                let st = window.pageYOffset || document.documentElement.scrollTop;
                if (st > lastScrollTop) {
                    this.scrollingDown = true;
                    this.scrollingUp = false;
                } else {
                    this.scrollingDown = false;
                    this.scrollingUp = true;
                    if (st == 0) {
                        this.scrollingDown = false;
                        this.scrollingUp = false;
                    }
                }
                lastScrollTop = st <= 0 ? 0 : st;
            });
        };

        const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'));
            }
            return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        };

        const setTheme = (value) => {
            window.localStorage.setItem('dark', value);
        };

        return {
            init,
            isDarkMode: getTheme(),
            toggleTheme() {
                this.isDarkMode = !this.isDarkMode;
                setTheme(this.isDarkMode);
            },
            isSidebarOpen: window.innerWidth > 1024,
            isSidebarHovered: false,
            handleSidebarHover(value) {
                if (window.innerWidth < 1024) return;
                this.isSidebarHovered = value;
            },
            handleWindowResize() {
                if (window.innerWidth <= 1024) {
                    this.isSidebarOpen = false;
                } else {
                    this.isSidebarOpen = true;
                }
            },
            scrollingDown: false,
            scrollingUp: false,
        };
    });
});

Alpine.plugin(collapse);
Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".mySwiper", {
        slidesPerView: 1,
        loop: true,
        autoplay: {
            delay: 2500,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
});

const keenSliderActive = document.getElementById("keen-slider-active");
const keenSliderCount = document.getElementById("keen-slider-count");

const keenSlider = new KeenSlider(
    "#keen-slider",
    {
        loop: true,
        defaultAnimation: {
            duration: 750,
        },
        slides: {
            origin: "center",
            perView: 1,
            spacing: 16,
        },
        breakpoints: {
            "(min-width: 640px)": {
                slides: {
                    origin: "center",
                    perView: 1.5,
                    spacing: 16,
                },
            },
            "(min-width: 768px)": {
                slides: {
                    origin: "center",
                    perView: 1.75,
                    spacing: 16,
                },
            },
            "(min-width: 1024px)": {
                slides: {
                    origin: "center",
                    perView: 3,
                    spacing: 16,
                },
            },
        },
        created(slider) {
            slider.slides[slider.track.details.rel].classList.remove("opacity-40");
            keenSliderActive.innerText = slider.track.details.rel + 1;
            keenSliderCount.innerText = slider.slides.length;
        },
        slideChanged(slider) {
            slider.slides.forEach((slide) => slide.classList.add("opacity-40"));
            slider.slides[slider.track.details.rel].classList.remove("opacity-40");
            keenSliderActive.innerText = slider.track.details.rel + 1;
        },
    },
    []
);

const keenSliderPrevious = document.getElementById("keen-slider-previous");
const keenSliderNext = document.getElementById("keen-slider-next");

keenSliderPrevious.addEventListener("click", () => keenSlider.prev());
keenSliderNext.addEventListener("click", () => keenSlider.next());