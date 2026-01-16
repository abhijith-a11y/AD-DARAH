/**
 * Corporate Services Slider Component JavaScript
 */

(function () {
	"use strict";

	console.log("CorporateServicesSlider: Script loaded");

	/**
	 * Initialize Corporate Services Swiper
	 */
	const initCorporateServicesSwiper = function () {
		// Check if Swiper is loaded
		if (typeof Swiper === "undefined") {
			return;
		}

		const swiperElement = document.querySelector("[data-corporate-services-swiper]");

		if (!swiperElement) {
			return;
		}

		if (swiperElement.swiper || swiperElement._swiperInstance) {
			return;
		}

		const slides = swiperElement.querySelectorAll(".swiper-slide");

		if (slides.length === 0) {
			console.warn("CorporateServicesSlider: No slides found");
			return;
		}

		try {
			const swiperConfig = {
				spaceBetween: 20,
				slidesPerView: 1,
				autoplay: false,
				breakpoints: {
					768: {
						slidesPerView: 2,
						spaceBetween: 20,
					},
					1024: {
						slidesPerView: 3,
						spaceBetween: 20,
					},
					1200: {
						slidesPerView: 2.8,
						spaceBetween: 20,
					},
				},
			};

			console.log("CorporateServicesSlider: Config:", swiperConfig);
			const swiperInstance = new Swiper(swiperElement, swiperConfig);
			swiperElement._swiperInstance = swiperInstance;

			// Explicitly stop autoplay if it exists
			if (swiperInstance.autoplay) {
				swiperInstance.autoplay.stop();
			}
		} catch (error) {
			console.error("CorporateServicesSlider: Error initializing Swiper:", error);
		}
	};

	/**
	 * Wait for DOM and Swiper to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				setTimeout(initCorporateServicesSwiper, 100);
			});
		} else {
			setTimeout(initCorporateServicesSwiper, 100);
		}
	};

	// Initialize when ready
	waitForReady();
})();

