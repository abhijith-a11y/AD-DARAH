/**
 * Perfect Day Slider Component JavaScript
 */

(function () {
	"use strict";

	const initPerfectDaySwiper = function () {
		if (typeof Swiper === "undefined") {
			console.warn(
				"PerfectDaySlider: Swiper library is not loaded, retrying..."
			);
			setTimeout(initPerfectDaySwiper, 200);
			return;
		}

		const swiperElement = document.querySelector("[data-perfect-day-swiper]");
		if (!swiperElement) {
			console.warn("PerfectDaySlider: Swiper element not found");
			return;
		}

		if (swiperElement.swiper) {
			console.log("PerfectDaySlider: Swiper already initialized");
			return;
		}

		const slides = swiperElement.querySelectorAll(".swiper-slide");
		if (slides.length === 0) {
			console.warn("PerfectDaySlider: No slides found");
			return;
		}

		try {
			const swiperInstance = new Swiper(swiperElement, {
				spaceBetween: 20,
				slidesPerView: 1,
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

			console.log(
				"PerfectDaySlider: Swiper initialized successfully",
				swiperInstance
			);
		} catch (error) {
			console.error("PerfectDaySlider: Error initializing Swiper", error);
		}
	};

	const init = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				// Wait a bit longer to ensure Swiper CSS is loaded
				setTimeout(initPerfectDaySwiper, 500);
			});
		} else {
			// Wait a bit longer to ensure Swiper CSS is loaded
			setTimeout(initPerfectDaySwiper, 500);
		}
	};

	// Initialize on page load
	init();

	// Also try initializing when window loads (ensures all resources are loaded)
	window.addEventListener("load", function () {
		setTimeout(initPerfectDaySwiper, 100);
	});

	// Re-initialize if content is loaded dynamically (for AJAX/SPA scenarios)
	if (typeof window !== "undefined") {
		window.initPerfectDaySwiper = initPerfectDaySwiper;
	}
})();
