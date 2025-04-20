<!-- Custom style -->
<style>
    .swiper-wrapper {
        height: fit-content !important;
        width: 100% !important;
        padding: 2rem 0;
    }

    .swiper-pagination {
        display: flex;
        align-items: center;
        justify-content: start;
        gap: 16px;
        position: relative;
        margin-top: 2rem;
    }

    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        text-align: center;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.5;
        background: #ffffff;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .swiper-pagination-bullet:hover {
        transform: scale(1.1);
        opacity: 0.8;
    }

    .swiper-pagination-bullet-active {
        opacity: 1;
        background: linear-gradient(135deg, #4F46E5, #7C3AED);
        transform: scale(1.2);
        box-shadow: 0 0 15px rgba(79, 70, 229, 0.5);
    }

    .slide-card {
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        transform: scale(0.9);
        opacity: 0;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        width: 100% !important;
        margin: 0 auto;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100% !important;
    }

    .swiper-slide-active .slide-card {
        transform: scale(1);
        opacity: 1;
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(79, 70, 229, 0.5);
        box-shadow: 0 0 30px rgba(79, 70, 229, 0.2);
    }

    .step-number {
        position: absolute;
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #4F46E5, #7C3AED);
        color: white;
        padding: 8px 24px;
        border-radius: 100px;
        font-weight: 600;
        box-shadow: 0 4px 20px rgba(79, 70, 229, 0.3);
        z-index: 10;
        transition: all 0.3s ease;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: #4F46E5;
        background: rgba(255, 255, 255, 0.1);
        width: 44px;
        height: 44px;
        border-radius: 50%;
        backdrop-filter: blur(8px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
        box-shadow: 0 0 15px rgba(79, 70, 229, 0.3);
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 18px;
        font-weight: bold;
    }

    .swiper-button-prev, .swiper-rtl .swiper-button-next {
        left: var(--swiper-navigation-sides-offset, 10px);
        top: auto;
    }

    .swiper-button-next, .swiper-rtl .swiper-button-prev {
        right: var(--swiper-navigation-sides-offset, 10px);
        top: auto;
    }

    .mySwiper {
        width: 100%;
        overflow: visible !important;
        padding: 20px 0;
    }

    @media (max-width: 768px) {
        .swiper-pagination {
            justify-content: center;
        }
        .swiper-button-next,
        .swiper-button-prev {
            display: none;
        }
        .slide-card {
            width: 95% !important;
            margin: 0 auto;
        }
    }

    @keyframes floatUpDown {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-15px);
        }
    }

    .animate-float {
        animation: floatUpDown 3s ease-in-out infinite;
    }

    .swiper {
        width: 100%;
        height: auto;
        position: relative;
        overflow: hidden !important;
    }

    /* New hover effects for cards */
    .slide-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.1), 0 10px 10px -5px rgba(79, 70, 229, 0.04);
    }

    /* Enhanced text styles */
    h2 {
        background: linear-gradient(135deg, #ffffff, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    p {
        line-height: 1.7;
    }
</style>

<section class="py-24 relative bg-gradient-to-b from-gray-900 to-indigo-900 overflow-hidden rounded-3xl">
    {{-- Background Gradient --}}">
    {{-- Background Effects --}}
    <div class="absolute inset-0 flex justify-center items-center pointer-events-none overflow-hidden">
        <div class="w-[600px] h-[600px] bg-gradient-to-br from-blue-600/20 via-indigo-500/20 to-purple-500/20 rounded-full blur-3xl opacity-50 animate-slow-spin"></div>
        <div class="w-[400px] h-[400px] bg-gradient-to-tr from-pink-500/20 via-rose-500/20 to-red-500/20 rounded-full blur-3xl opacity-50 animate-slow-spin-reverse"></div>
    </div>
    
    <div class="w-full px-4 md:px-5 lg:px-5 mx-auto relative">
        <div class="w-full flex-col justify-start items-center lg:gap-16 gap-8 inline-flex">
            <div class="w-full flex-col justify-start items-center gap-6 flex">
                <h1 class="w-full text-center text-5xl font-bold tracking-tight bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent">How It Works</h1>
                <p class="w-full text-center text-gray-300 text-xl max-w-2xl mx-auto">Follow these three simple steps to land your dream job!</p>
            </div>

            <div class="w-full justify-start lg:items-center items-center lg:gap-16 gap-8 flex lg:flex-row flex-col">
                <img class="w-full max-w-lg object-contain hover:scale-105 transition-transform duration-500 animate-float z-10"
                    src="{{ asset('images/Job hunt-rafiki.svg') }}" loading="lazy"
                    alt="Visual showing three steps of job application process" />

                <div class="swiper mySwiper flex flex-col w-full relative">
                    <div class="swiper-wrapper">
                        <!-- 1st Slide -->
                        <div class="swiper-slide">
                            <div class="slide-card w-full flex-col justify-center items-start gap-5 flex p-8 relative group">
                                <div class="step-number group-hover:scale-110 transition-transform duration-300">Step 1</div>
                                <div class="w-full flex-col justify-center lg:items-start items-center gap-4 flex pt-4">
                                    <h2 class="text-white text-2xl font-semibold leading-8 lg:text-start text-center group-hover:text-blue-400 transition-colors duration-300">
                                        Create an Account
                                    </h2>
                                    <p class="lg:max-w-3xl w-full text-gray-300 text-lg font-normal leading-relaxed lg:text-start text-center group-hover:text-white transition-colors duration-300">
                                        Sign up and set up your profile in just a few minutes. Showcase your skills and experience to stand out.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 2nd Slide -->
                        <div class="swiper-slide">
                            <div class="slide-card w-full flex-col justify-center items-start gap-5 flex p-8 relative group">
                                <div class="step-number group-hover:scale-110 transition-transform duration-300">Step 2</div>
                                <div class="w-full flex-col justify-center lg:items-start items-center gap-4 flex pt-4">
                                    <h2 class="text-white text-2xl font-semibold leading-8 lg:text-start text-center group-hover:text-blue-400 transition-colors duration-300">
                                        Upload Resume & Apply
                                    </h2>
                                    <p class="lg:max-w-3xl w-full text-gray-300 text-lg font-normal leading-relaxed lg:text-start text-center group-hover:text-white transition-colors duration-300">
                                        Upload your resume and start applying for jobs that match your skills and aspirations.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 3rd Slide -->
                        <div class="swiper-slide">
                            <div class="slide-card w-full flex-col justify-center items-start gap-5 flex p-8 relative group">
                                <div class="step-number group-hover:scale-110 transition-transform duration-300">Step 3</div>
                                <div class="w-full flex-col justify-center lg:items-start items-center gap-4 flex pt-4">
                                    <h2 class="text-white text-2xl font-semibold leading-8 lg:text-start text-center group-hover:text-blue-400 transition-colors duration-300">
                                        Get Hired! 🚀
                                    </h2>
                                    <p class="lg:max-w-3xl w-full text-gray-300 text-lg font-normal leading-relaxed lg:text-start text-center group-hover:text-white transition-colors duration-300">
                                        Connect with top employers and get your dream job. Start your new career journey today!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom JS -->
<script>
   var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        initialSlide: 0,
        centeredSlides: true,
        loop: true,
        speed: 800,
        effect: "slide",
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
 