/**
 * Single Testimonial Component JavaScript
 * Handles Swiper initialization for single testimonial slider
 */

(function () {
	"use strict";

	/**
	 * Initialize Single Testimonial Swiper
	 */
	const initSingleTestimonialSwiper = function () {
		// Check if Swiper is loaded
		if (typeof Swiper === "undefined") {
			console.warn("SingleTestimonial: Swiper library is not loaded");
			return;
		}

		const swiperElement = document.querySelector("[data-single-testimonial-swiper]");
		if (!swiperElement) {
			console.warn("SingleTestimonial: Swiper element not found");
			return;
		}

		// Check if already initialized
		if (swiperElement.swiper || swiperElement._swiperInstance) {
			console.log("SingleTestimonial: Swiper already initialized");
			return;
		}

		const slides = swiperElement.querySelectorAll(".swiper-slide");
		if (slides.length === 0) {
			console.warn("SingleTestimonial: No slides found");
			return;
		}

		try {
			const swiperInstance = new Swiper(swiperElement, {
				slidesPerView: 1,
				spaceBetween: 20,
				loop: slides.length > 2,
				speed: 600,
				direction: "horizontal",
				centeredSlides: false,
				autoplay: {
					delay: 5000,
					disableOnInteraction: false,
				},
				breakpoints: {
					320: {
						slidesPerView: 1,
						spaceBetween: 15,
					},
					768: {
						slidesPerView: 1.5,
						spaceBetween: 20,
					},
					1024: {
						slidesPerView: 2,
						spaceBetween: 20,
					},
					1200: {
						slidesPerView: 2.5,
						spaceBetween: 20,
					},
				},
			});

			swiperElement._swiperInstance = swiperInstance;
			console.log("SingleTestimonial: Swiper initialized successfully", swiperInstance);
		} catch (error) {
			console.error("SingleTestimonial: Error initializing Swiper", error);
		}
	};

	/**
	 * Wait for DOM and Swiper to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				setTimeout(initSingleTestimonialSwiper, 100);
			});
		} else {
			setTimeout(initSingleTestimonialSwiper, 100);
		}
	};

	// Initialize when ready
	waitForReady();

	// Also try initializing when window loads
	window.addEventListener("load", function () {
		setTimeout(initSingleTestimonialSwiper, 100);
	});
})();

