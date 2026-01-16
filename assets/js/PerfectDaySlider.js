/**
 * Perfect Day Slider Component JavaScript
 * 
 * Handles scrollbar visibility on scroll
 */

(function() {
	'use strict';

	/**
	 * Initialize Perfect Day Slider Scrollbar
	 */
	const initPerfectDaySlider = function() {
		const sliderElement = document.querySelector('.perfect-day-slider');
		if (!sliderElement) {
			return;
		}

		let scrollTimeout;

		// Add scrolling class when user scrolls
		sliderElement.addEventListener('scroll', function() {
			sliderElement.classList.add('scrolling');

			// Remove scrolling class after scroll ends
			clearTimeout(scrollTimeout);
			scrollTimeout = setTimeout(function() {
				sliderElement.classList.remove('scrolling');
			}, 500);
		});
	};

	/**
	 * Wait for DOM to be ready
	 */
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initPerfectDaySlider);
	} else {
		initPerfectDaySlider();
	}

})();

