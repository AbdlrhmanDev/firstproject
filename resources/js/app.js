import './bootstrap'
// import Swiper JS
import Swiper from 'swiper';
// import Swiper styles
import 'swiper/css';

import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'
import PerfectScrollbar from 'perfect-scrollbar'









 var swiper = new Swiper(".mySwiper", {
     slidesPerView: 1,
     spaceBetween: 32,
     loop: true,
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






window.PerfectScrollbar = PerfectScrollbar

document.addEventListener('alpine:init', () => {
    Alpine.data('mainState', () => {
        let lastScrollTop = 0
        const init = function () {
            window.addEventListener('scroll', () => {
                let st =
                    window.pageYOffset || document.documentElement.scrollTop
                if (st > lastScrollTop) {
                    // downscroll
                    this.scrollingDown = true
                    this.scrollingUp = false
                } else {
                    // upscroll
                    this.scrollingDown = false
                    this.scrollingUp = true
                    if (st == 0) {
                        //  reset
                        this.scrollingDown = false
                        this.scrollingUp = false
                    }
                }
                lastScrollTop = st <= 0 ? 0 : st // For Mobile or negative scrolling
            })
        }

        const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
            }
            return (
                !!window.matchMedia &&
                window.matchMedia('(prefers-color-scheme: dark)').matches
            )
        }
        const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
        }
        return {
            init,
            isDarkMode: getTheme(),
            toggleTheme() {
                this.isDarkMode = !this.isDarkMode
                setTheme(this.isDarkMode)
            },
            isSidebarOpen: window.innerWidth > 1024,
            isSidebarHovered: false,
            handleSidebarHover(value) {
                if (window.innerWidth < 1024) {
                    return
                }
                this.isSidebarHovered = value
            },
            handleWindowResize() {
                if (window.innerWidth <= 1024) {
                    this.isSidebarOpen = false
                } else {
                    this.isSidebarOpen = true
                }
            },
            scrollingDown: false,
            scrollingUp: false,
        }
    })
})

Alpine.plugin(collapse)

Alpine.start()


