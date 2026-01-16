/**
 * Perfect Day Slider Component JavaScript
 */

(function () {
	"use strict";

	/**
	 * Initialize Perfect Day Swiper
	 */
	const initPerfectDaySwiper = function () {
		// Check if Swiper is loaded
		if (typeof Swiper === "undefined") {
			console.warn("PerfectDaySlider: Swiper library is not loaded");
			return;
		}

		const swiperElement = document.querySelector("[data-perfect-day-swiper]");
		if (swiperElement && !swiperElement.swiper && !swiperElement._swiperInstance) {
			const slides = swiperElement.querySelectorAll(".swiper-slide");
			const swiperInstance = new Swiper(swiperElement, {
				spaceBetween: 20,
				slidesPerView: 3.2,
				loop: slides.length > 2,
				speed: 800,
				autoplay: {
					delay: 3000,
					disableOnInteraction: false,
				},
				breakpoints: {
					768: {
						slidesPerView: 2,
						spaceBetween: 20,
						loop: slides.length > 2,
					},
				},
			});
			swiperElement._swiperInstance = swiperInstance;
		}
	};

	/**
	 * Wait for DOM and Swiper to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				setTimeout(initPerfectDaySwiper, 100);
			});
		} else {
			setTimeout(initPerfectDaySwiper, 100);
		}
	};

	// Initialize when ready
	waitForReady();
})();
