/**
 * Services Stack Component JavaScript
 * Handles GSAP scroll-triggered stack effect
 * Based on stack_sample reference
 */

(function () {
	"use strict";

	/**
	 * Initialize Services Stack Component
	 */
	const initServicesStack = function () {
		const cards = document.querySelectorAll("[data-services-card]");

		if (cards.length === 0) {
			return;
		}

		// Check if GSAP and ScrollTrigger are available
		if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") {
			console.warn("ServicesStack: GSAP or ScrollTrigger not loaded");
			return;
		}

		// Register ScrollTrigger plugin
		gsap.registerPlugin(ScrollTrigger);

		// Convert cards to array (like panels in sample)
		const cardsArray = gsap.utils.toArray(cards);

		// Pin each card individually - they will stack on top of each other
		cardsArray.forEach(function (card, index) {
			const isLast = index === cardsArray.length - 1;

			ScrollTrigger.create({
				trigger: card,
				start: "top top", // Stack at top of viewport
				end: isLast ? "+=100vh" : undefined, // Last card unpins after scrolling 100vh
				pin: true,
				pinSpacing: isLast ? true : false, // Last card needs spacing to allow normal scroll after
			});
		});
	};

	/**
	 * Wait for DOM and GSAP to be ready
	 */
	const waitForReady = function () {
		if (document.readyState === "loading") {
			document.addEventListener("DOMContentLoaded", function () {
				setTimeout(initServicesStack, 100);
			});
		} else {
			setTimeout(initServicesStack, 100);
		}
	};

	// Initialize when ready
	waitForReady();
})();
