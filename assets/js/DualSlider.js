/**
 * Dual Slider Component JavaScript
 * 
 * Handles synchronized Swiper sliders for text and image
 */

(function () {
	"use strict";

	/**
	 * Initialize Dual Slider
	 */
	const initDualSlider = function () {
		// Check if Swiper is loaded
		if (typeof Swiper === "undefined") {
			console.warn("DualSlider: Swiper library is not loaded");
			return;
		}

		const sectionElement = document.querySelector("[data-dual-slider]");
		if (!sectionElement) {
			console.warn("DualSlider: Section element not found");
			return;
		}

		const textSwiperElement = sectionElement.querySelector("[data-dual-text-swiper]");
		const imageSwiperElement = sectionElement.querySelector("[data-dual-image-swiper]");

		if (!textSwiperElement || !imageSwiperElement) {
			console.warn("DualSlider: Swiper elements not found");
			return;
		}

		// Check if already initialized
		if (textSwiperElement.swiper || imageSwiperElement.swiper) {
			console.log("DualSlider: Swiper already initialized");
			return;
		}

		const prevButton = sectionElement.querySelector(".dual-slider-prev");
		const nextButton = sectionElement.querySelector(".dual-slider-next");

		// Common Swiper config with loop enabled
		const swiperConfig = {
			spaceBetween: 0,
			slidesPerView: 1,
			speed: 800,
			allowTouchMove: true,
			loop: true,
			loopAdditionalSlides: 1,
		};

		// Initialize Text Swiper
		const textSwiperConfig = {
			...swiperConfig,
		};

		// Initialize Image Swiper
		const imageSwiperConfig = {
			...swiperConfig,
		};

		try {
			// Initialize both Swipers (without navigation first)
			const textSwiper = new Swiper(textSwiperElement, textSwiperConfig);
			const imageSwiper = new Swiper(imageSwiperElement, imageSwiperConfig);

			// Synchronize both sliders on slide change (using realIndex for loop)
			textSwiper.on("slideChange", function () {
				const realIndex = textSwiper.realIndex;
				if (imageSwiper.realIndex !== realIndex) {
					imageSwiper.slideToLoop(realIndex);
				}
			});

			imageSwiper.on("slideChange", function () {
				const realIndex = imageSwiper.realIndex;
				if (textSwiper.realIndex !== realIndex) {
					textSwiper.slideToLoop(realIndex);
				}
			});

			// Add manual navigation button handlers
			if (prevButton && nextButton) {
				prevButton.addEventListener("click", function () {
					textSwiper.slidePrev();
					imageSwiper.slidePrev();
				});

				nextButton.addEventListener("click", function () {
					textSwiper.slideNext();
					imageSwiper.slideNext();
				});
			}

			// Store instances
			textSwiperElement._swiperInstance = textSwiper;
			imageSwiperElement._swiperInstance = imageSwiper;

			console.log("DualSlider: Swipers initialized successfully", {
				textSwiper: textSwiper,
				imageSwiper: imageSwiper,
			});
		} catch (error) {
			console.error("DualSlider: Error initializing Swiper", error);
		}
	};

	/**
	 * Wait for DOM and Swiper to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				setTimeout(function () {
					if (typeof Swiper !== "undefined") {
						initDualSlider();
					} else {
						retryInit();
					}
				}, 100);
			});
		} else {
			setTimeout(function () {
				if (typeof Swiper !== "undefined") {
					initDualSlider();
				} else {
					retryInit();
				}
			}, 100);
		}
	};

	/**
	 * Retry initialization if Swiper is not loaded
	 */
	let retryCount = 0;
	const maxRetries = 10;
	const retryInit = function () {
		if (retryCount < maxRetries) {
			retryCount++;
			setTimeout(function () {
				if (typeof Swiper !== "undefined") {
					initDualSlider();
				} else {
					retryInit();
				}
			}, 200);
		} else {
			console.error("DualSlider: Failed to load Swiper after multiple retries.");
		}
	};

	// Initialize when ready
	waitForReady();
})();

