<!--Custom style-->
<style>
    .swiper-wrapper {
        height: fit-content !important;
        width: 100% !important;
    }

    .swiper-pagination {
        display: flex;
        align-items: center;
        justify-content: start;
        gap: 16px;
        position: relative;
    }

    .swiper-pagination-bullet {
        width: 42px;
        height: 42px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 26px;
        font-size: 16px;
        color: #6B7280;
        opacity: 1;
        background: #F9FAFB;
        border: 1px solid #E5E7EB;
    }

    .swiper-pagination-bullet-active {
        color: #fff;
        background: #cad5f3;
    }

    .swiper-horizontal>.swiper-pagination-bullets,
    .swiper-pagination-bullets.swiper-pagination-horizontal,
    .swiper-pagination-custom,
    .swiper-pagination-fraction {
        bottom: var(--swiper-pagination-bottom, 0px);
    }
</style>
<section class="py-24 relative">
    <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
        <div class="w-full flex-col justify-start items-center lg:gap-12 gap-8 inline-flex">
            <div class="w-full flex-col justify-start items-center gap-3 flex">
                <h1 class="w-full text-center text-white text-4xl ">How It Works</h1>
                <p class="w-full text-center text-white text-xl ">Follow these three simple steps to land your dream
                    job!</p>


            </div>
            <div class="w-full justify-start lg:items-end items-center lg:gap-16 gap-8 flex lg:flex-row flex-col">
                <img class="object-cover" src="https://pagedone.io/asset/uploads/1720589731.png"
                    alt="How It Works image" />
                <div class="swiper mySwiper flex flex-col lg:gap-32 gap-16 w-full">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="w-full flex-col justify-center items-start gap-5 flex bg-white/10 backdrop-blur-lg p-8 rounded-lg shadow-xl">
                                <span
                                    class="w-full text-white text-base font-medium leading-relaxed lg:text-start text-center">1st
                                    Step</span>
                                <div class="w-full flex-col justify-center lg:items-start items-center gap-1.5 flex">
                                    <h4
                                        class="text-white text-base font-normal font-semibold leading-8 lg:text-start text-center">
                                        Create an Account
                                    </h4>
                                    <p
                                        class="lg:max-w-3xl w-full text-gray-300 text-base font-normal leading-relaxed lg:text-start text-center">
                                        Sign up and set up your profile in just a few minutes.</p>

                                </div>
                            </div>
                        </div>
                        
                        <div class="swiper-slide">
                        <div class="w-full flex-col justify-center items-start gap-5 flex  bg-white/10 backdrop-blur-lg p-8 rounded-lg shadow-xl">
                            <span class="w-full text-white text-base font-medium leading-relaxed lg:text-start text-center">2st
                                Step</span>
                            <div class="w-full flex-col justify-center lg:items-start items-center gap-1.5 flex">
                                <h4 class="text-white text-base font-normal font-semibold leading-8 lg:text-start text-center">
                                    Upload Resume & Apply
                                </h4>
                                <p class="lg:max-w-3xl w-full text-gray-300 text-base font-normal leading-relaxed lg:text-start text-center">
                                Upload your resume and start applying for jobs.</p>
                        
                            </div>
                        </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="w-full flex-col justify-center items-start gap-4 flex  bg-white/10 backdrop-blur-lg p-8 rounded-lg shadow-xl">
                                <span
                                    class="w-full text-white text-base font-medium leading-relaxed lg:text-start text-center">3th
                                    Step</span>
                                <div class="flex-col justify-center lg:items-start items-center gap-1.5 flex">
                                    <h4 class="text-white text-xl font-semibold leading-8 lg:text-start text-center">
                                    Get Hired! 🚀</h4>
                                    <p
                                        class="lg:max-w-3xl w-full text-gray-300 text-base font-normal leading-relaxed lg:text-start text-center">
                                    Connect with top employers and get your dream job.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination lg:justify-start justify-center"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Custom JS -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 19,
        loop: true,
        centeredSlides: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '">' + (index + 0) + "</span>";
            },
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
</script>