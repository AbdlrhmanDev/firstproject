<!--
  Heads up! 👋

  This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
-->

{{--
<link href="https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/keen-slider.min.css" rel="stylesheet" />

<script type="module">
  import KeenSlider from 'https://cdn.jsdelivr.net/npm/keen-slider@6.8.6/+esm'

  const keenSliderActive = document.getElementById('keen-slider-active')
  const keenSliderCount = document.getElementById('keen-slider-count')

  const keenSlider = new KeenSlider(
    '#keen-slider',
    {
      loop: true,
      defaultAnimation: {
        duration: 750,
      },
      slides: {
        origin: 'center',
        perView: 1,
        spacing: 16,
      },
      breakpoints: {
        '(min-width: 640px)': {
          slides: {
            origin: 'center',
            perView: 1.5,
            spacing: 16,
          },
        },
        '(min-width: 768px)': {
          slides: {
            origin: 'center',
            perView: 1.75,
            spacing: 16,
          },
        },
        '(min-width: 1024px)': {
          slides: {
            origin: 'center',
            perView: 3,
            spacing: 16,
          },
        },
      },
      created(slider) {
        slider.slides[slider.track.details.rel].classList.remove('opacity-40')

        keenSliderActive.innerText = slider.track.details.rel + 1
        keenSliderCount.innerText = slider.slides.length
      },
      slideChanged(slider) {
        slider.slides.forEach((slide) => slide.classList.add('opacity-40'))

        slider.slides[slider.track.details.rel].classList.remove('opacity-40')

        keenSliderActive.innerText = slider.track.details.rel + 1
      },
    },
    []
  )

  const keenSliderPrevious = document.getElementById('keen-slider-previous')
  const keenSliderNext = document.getElementById('keen-slider-next')

  keenSliderPrevious.addEventListener('click', () => keenSlider.prev())
  keenSliderNext.addEventListener('click', () => keenSlider.next())
</script> --}}

{{-- <section>

  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
    <h2 class="text-center text-4xl font-bold tracking-tight text-white sm:text-5xl">
      Hear from Our Experts in Tech & Design
    </h2>

    <div class="mt-8">
      <div id="keen-slider" class="keen-slider">
        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-[#223387] p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt=""
                src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                class="size-14 rounded-full object-cover" />

              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>

                <p class="mt-0.5 text-lg font-medium text-white">Backend Engineer</p>
              </div>
            </div>

            <p class="mt-4 text-[#cacaca]">
              Seeking an experienced Backend Engineer with strong knowledge of APIs
            </p>
          </blockquote>
        </div>

        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-gray-50 p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt=""
                src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                class="size-14 rounded-full object-cover" />

              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>

                <p class="mt-0.5 text-lg font-medium text-gray-900">Frontend Developer</p>
              </div>
            </div>

            <p class="mt-4 text-gray-700">
              We are looking for a passionate Frontend Developer to join our team.
            </p>
          </blockquote>
        </div>

        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-[#2a3ea3] p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt=""
                src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                class="size-14 rounded-full object-cover" />

              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>

                <p class="mt-0.5 text-lg font-medium text-white">Data Scientist</p>
              </div>
            </div>

            <p class="mt-4 text-[#cacaca]">
              Looking for a Data Scientist to analyze and interpret complex data.
            </p>
          </blockquote>
        </div>

        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-gray-50 p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt=""
                src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                class="size-14 rounded-full object-cover" />

              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                      d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>

                <p class="mt-0.5 text-lg font-medium text-gray-900">UX/UI Designer</p>
              </div>
            </div>

            <p class="mt-4 text-gray-700">
              Join us as a UX/UI Designer and create amazing user experiences.
            </p>
          </blockquote>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-center gap-4">
        <button aria-label="Previous slide" id="keen-slider-previous"
          class="text-white transition-colors hover:text-gray-900">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </button>

        <p class="w-16 text-center text-sm text-gray-700">
          <span id="keen-slider-active" class="text-white"></span>
          /
          <span id="keen-slider-count" class="text-white"></span>
        </p>

        <button aria-label="Next slide" id="keen-slider-next" class="text-white transition-colors hover:text-gray-900">
          <svg class="size-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</section> --}}


{{-- <section>
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
    <h2 class="text-center text-4xl font-bold tracking-tight text-white sm:text-5xl">
      Hear from Our Experts in Tech & Design
    </h2>

    <div class="mt-8">
      <div id="keen-slider" class="keen-slider">

        <!-- Slide 1 -->
        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-[#223387] p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt="" src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?..."
                class="size-14 rounded-full object-cover" />
              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  @for ($i = 0; $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c..." />
            </svg>
          @endfor
                </div>
                <p class="mt-0.5 text-lg font-medium text-white">Backend Engineer</p>
              </div>
            </div>
            <p class="mt-4 text-gray-200">
              Seeking an experienced Backend Engineer with strong knowledge of APIs
            </p>
          </blockquote>
        </div>

        <!-- Slide 2 -->
        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-white p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt="" src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?..."
                class="size-14 rounded-full object-cover" />
              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  @for ($i = 0; $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c..." />
            </svg>
          @endfor
                </div>
                <p class="mt-0.5 text-lg font-medium text-gray-800">Frontend Developer</p>
              </div>
            </div>
            <p class="mt-4 text-gray-800"> We are looking for a passionate Frontend Developer to join our team.
            </p>
          </blockquote>
        </div>

        <!-- Slide 3 -->
        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-[#2a3ea3] p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt="" src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?..."
                class="size-14 rounded-full object-cover" />
              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  @for ($i = 0; $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c..." />
            </svg>
          @endfor
                </div>
                <p class="mt-0.5 text-lg font-medium text-white">Data Scientist</p>
              </div>
            </div>
            <p class="mt-4 text-gray-200">
              Looking for a Data Scientist to analyze and interpret complex data.
            </p>
          </blockquote>
        </div>

        <!-- Slide 4 -->
        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-gray-100 p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt="" src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?..."
                class="size-14 rounded-full object-cover" />
              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  @for ($i = 0; $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c..." />
            </svg>
          @endfor
                </div>
                <p class="mt-0.5 text-lg font-medium text-gray-900">UX/UI Designer</p>
              </div>
            </div>
            <p class="mt-4 text-gray-900">
              Join us as a UX/UI Designer and create amazing user experiences.
            </p>
          </blockquote>
        </div>

      </div>

      <!-- Navigation Buttons -->
      <div class="mt-6 flex items-center justify-center gap-4">
        <button aria-label="Previous slide" id="keen-slider-previous"
          class="text-white transition-colors hover:text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </button>

        <p class="w-16 text-center text-sm text-gray-300">
          <span id="keen-slider-active" class="text-white"></span>
          /
          <span id="keen-slider-count" class="text-white"></span>
        </p>

        <button aria-label="Next slide" id="keen-slider-next" class="text-white transition-colors hover:text-gray-300">
          <svg class="size-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</section> --}}.

<section>
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
    <h2 class="text-center text-4xl font-bold tracking-tight text-white sm:text-5xl">
      Hear from Our Experts in Tech & Design
    </h2>

    <div class="mt-8">
      <div id="keen-slider" class="keen-slider">

        <!-- Slide 1 -->
        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-[#223387] p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt="" src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?..."
                class="size-14 rounded-full object-cover" />
              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  @for ($i = 0; $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
            <path
              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967h4.175c.969 0 1.371 1.24.588 1.81l-3.378 2.455 1.287 3.967c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.378 2.455c-.785.57-1.84-.197-1.54-1.118l1.287-3.967-3.378-2.455c-.784-.57-.38-1.81.588-1.81h4.175L9.049 2.927z" />
            </svg>
          @endfor
                </div>
                <p class="mt-0.5 text-lg font-medium text-white">Backend Engineer</p>
              </div>
            </div>
            <p class="mt-4 text-gray-200">
              Seeking an experienced Backend Engineer with strong knowledge of APIs
            </p>
          </blockquote>
        </div>

        <!-- Slide 2 -->
        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-white p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt="" src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?..."
                class="size-14 rounded-full object-cover" />
              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  @for ($i = 0; $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
            <path
              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967h4.175c.969 0 1.371 1.24.588 1.81l-3.378 2.455 1.287 3.967c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.378 2.455c-.785.57-1.84-.197-1.54-1.118l1.287-3.967-3.378-2.455c-.784-.57-.38-1.81.588-1.81h4.175L9.049 2.927z" />
            </svg>
          @endfor
                </div>
                <p class="mt-0.5 text-lg font-medium text-gray-800">Frontend Developer</p>
              </div>
            </div>
            <p class="mt-4 text-gray-800">
              We are looking for a passionate Frontend Developer to join our team.
            </p>
          </blockquote>
        </div>

        <!-- Slide 3 -->
        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-[#2a3ea3] p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt="" src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?..."
                class="size-14 rounded-full object-cover" />
              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  @for ($i = 0; $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
            <path
              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967h4.175c.969 0 1.371 1.24.588 1.81l-3.378 2.455 1.287 3.967c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.378 2.455c-.785.57-1.84-.197-1.54-1.118l1.287-3.967-3.378-2.455c-.784-.57-.38-1.81.588-1.81h4.175L9.049 2.927z" />
            </svg>
          @endfor
                </div>
                <p class="mt-0.5 text-lg font-medium text-white">Data Scientist</p>
              </div>
            </div>
            <p class="mt-4 text-gray-200">
              Looking for a Data Scientist to analyze and interpret complex data.
            </p>
          </blockquote>
        </div>

        <!-- Slide 4 -->
        <div class="keen-slider__slide opacity-40 transition-opacity duration-500">
          <blockquote class="rounded-lg bg-gray-100 p-6 shadow-xs sm:p-8">
            <div class="flex items-center gap-4">
              <img alt="" src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?..."
                class="size-14 rounded-full object-cover" />
              <div>
                <div class="flex justify-center gap-0.5 text-yellow-400">
                  @for ($i = 0; $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20" fill="currentColor">
            <path
              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967h4.175c.969 0 1.371 1.24.588 1.81l-3.378 2.455 1.287 3.967c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.378 2.455c-.785.57-1.84-.197-1.54-1.118l1.287-3.967-3.378-2.455c-.784-.57-.38-1.81.588-1.81h4.175L9.049 2.927z" />
            </svg>
          @endfor
                </div>
                <p class="mt-0.5 text-lg font-medium text-gray-900">UX/UI Designer</p>
              </div>
            </div>
            <p class="mt-4 text-gray-900">
              Join us as a UX/UI Designer and create amazing user experiences.
            </p>
          </blockquote>
        </div>

      </div>

      <!-- Navigation Buttons -->
      <div class="mt-6 flex items-center justify-center gap-4">
        <button aria-label="Previous slide" id="keen-slider-previous"
          class="text-white transition-colors hover:text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </button>

        <p class="w-16 text-center text-sm text-gray-300">
          <span id="keen-slider-active" class="text-white"></span>
          /
          <span id="keen-slider-count" class="text-white"></span>
        </p>

        <button aria-label="Next slide" id="keen-slider-next" class="text-white transition-colors hover:text-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="size-5">
            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
          </svg>
        </button>
      </div>
    </div>
  </div>
</section>