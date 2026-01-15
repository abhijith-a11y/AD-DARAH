/**
 * Header Component JavaScript
 * Converted from React to vanilla JavaScript for WordPress
 * 
 * Handles scroll detection, menu toggle, and animations
 */

(function() {
	'use strict';

	/**
	 * Initialize Header Component
	 */
	const initHeader = function() {
		const headerSection = document.getElementById('headerMainSection');
		const menuIcon = document.getElementById('menuIcon');
		const menuIconScroll = document.getElementById('menuIconScroll');
		
		if (!headerSection) {
			return;
		}

		let isScrolled = false;
		let isMenuOpen = false;
		const isHomePage = document.body.classList.contains('home');
		const initialHeaderContainer = document.getElementById('headerInitialContainer');
		const scrollHeaderContainer = document.getElementById('headerScrollContainer');
		const SCROLL_THRESHOLD = 700;

		// Show header immediately on non-home pages (pages without Banner component)
		if (!isHomePage) {
			// Add class to show header immediately
			document.body.classList.add('header_visible');
		}

		/**
		 * Handle scroll event
		 */
		const handleScroll = function() {
			const scrollY = window.scrollY || window.pageYOffset;
			
			// Handle initial header visibility (700px threshold)
			if (scrollY >= SCROLL_THRESHOLD) {
				if (initialHeaderContainer) {
					initialHeaderContainer.classList.add('header-inactive');
				}
				if (scrollHeaderContainer) {
					scrollHeaderContainer.classList.add('header-active');
				}
				// Add class to main header for white background
				headerSection.classList.add('header-scroll-active');
			} else {
				if (initialHeaderContainer) {
					initialHeaderContainer.classList.remove('header-inactive');
				}
				if (scrollHeaderContainer) {
					scrollHeaderContainer.classList.remove('header-active');
				}
				// Remove class from main header
				headerSection.classList.remove('header-scroll-active');
			}

			// Handle scrolled class for styling
			if (scrollY > 1) {
				if (!isScrolled) {
					isScrolled = true;
					headerSection.classList.add('scrolled');
				}
			} else {
				if (isScrolled) {
					isScrolled = false;
					headerSection.classList.remove('scrolled');
				}
			}
		};

		/**
		 * Toggle menu
		 */
		const toggleMenu = function(e) {
			if (e) {
				e.preventDefault();
				e.stopPropagation();
			}
			
			isMenuOpen = !isMenuOpen;
			
			if (menuIcon) {
				if (isMenuOpen) {
					menuIcon.classList.add('menu_open');
				} else {
					menuIcon.classList.remove('menu_open');
				}
			}
			if (menuIconScroll) {
				if (isMenuOpen) {
					menuIconScroll.classList.add('menu_open');
				} else {
					menuIconScroll.classList.remove('menu_open');
				}
			}

			// Toggle body classes
			document.body.classList.toggle('overflow_body_hidden');
			document.body.classList.toggle('header_activated');
			
			// Toggle mobile menu overlay
			const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
			if (mobileMenuOverlay) {
				if (isMenuOpen) {
					mobileMenuOverlay.classList.add('mobile_menu_open');
				} else {
					mobileMenuOverlay.classList.remove('mobile_menu_open');
				}
			}
		};

		/**
		 * Check current scroll position on load
		 */
		const checkInitialScroll = function() {
			handleScroll();
		};

		// Initialize - check scroll position immediately
		checkInitialScroll();
		
		// Also check after a short delay to ensure DOM is ready
		setTimeout(checkInitialScroll, 100);

		// Use Lenis scroll event if available, otherwise fallback to window scroll
		if (window.lenisInstance) {
			window.lenisInstance.on('scroll', ({ scroll }) => {
				// Handle initial header visibility (700px threshold)
				if (scroll >= SCROLL_THRESHOLD) {
					if (initialHeaderContainer) {
						initialHeaderContainer.classList.add('header-inactive');
					}
					if (scrollHeaderContainer) {
						scrollHeaderContainer.classList.add('header-active');
					}
					// Add class to main header for white background
					headerSection.classList.add('header-scroll-active');
				} else {
					if (initialHeaderContainer) {
						initialHeaderContainer.classList.remove('header-inactive');
					}
					if (scrollHeaderContainer) {
						scrollHeaderContainer.classList.remove('header-active');
					}
					// Remove class from main header
					headerSection.classList.remove('header-scroll-active');
				}

				// Handle scrolled class for styling
				if (scroll > 1) {
					if (!isScrolled) {
						isScrolled = true;
						headerSection.classList.add('scrolled');
					}
				} else {
					if (isScrolled) {
						isScrolled = false;
						headerSection.classList.remove('scrolled');
					}
				}
			});
		} else {
			// Fallback to window scroll event
			window.addEventListener('scroll', handleScroll, { passive: true });
		}

		// Add menu toggle event listener
		if (menuIcon) {
			menuIcon.addEventListener('click', toggleMenu);
		}
		if (menuIconScroll) {
			menuIconScroll.addEventListener('click', toggleMenu);
		}

		// Close menu when clicking outside or on menu items
		document.addEventListener('click', function(event) {
			const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
			if (isMenuOpen && mobileMenuOverlay) {
				// Close if clicking outside the menu overlay and menu icons
				const clickedOnMenuIcon = (menuIcon && menuIcon.contains(event.target)) || 
				                          (menuIconScroll && menuIconScroll.contains(event.target));
				if (!mobileMenuOverlay.contains(event.target) && !clickedOnMenuIcon) {
					toggleMenu();
				}
				// Close if clicking on a menu item
				if (mobileMenuOverlay.contains(event.target) && event.target.classList.contains('mobile_menu_item')) {
					setTimeout(toggleMenu, 300); // Small delay to allow navigation
				}
			}
		});

		// Close menu on escape key
		document.addEventListener('keydown', function(event) {
			if (event.key === 'Escape' && isMenuOpen) {
				toggleMenu();
			}
		});

		/**
		 * Initialize Dropdown Functionality
		 */
		const initDropdowns = function() {
			const dropdownArrows = document.querySelectorAll('.dropdown_arrow');
			const dropdownMenus = document.querySelectorAll('.dropdown_menu_fullwidth');
			
			// Close all dropdowns
			const closeAllDropdowns = function() {
				dropdownMenus.forEach(menu => {
					menu.classList.remove('dropdown_open');
				});
				dropdownArrows.forEach(arrow => {
					arrow.classList.remove('dropdown_active');
				});
				// Remove dropdown_open class from header
				if (headerSection) {
					headerSection.classList.remove('dropdown_open');
				}
			};

			// Calculate header height for dropdown positioning
			const updateDropdownPosition = function() {
				const headerSection = document.getElementById('headerMainSection');
				if (headerSection) {
					const headerHeight = headerSection.offsetHeight;
					dropdownMenus.forEach(menu => {
						menu.style.top = headerHeight + 'px';
					});
				}
			};

			// Update position on load and resize
			updateDropdownPosition();
			window.addEventListener('resize', updateDropdownPosition);

			// Handle dropdown toggle (both arrow and parent link)
			const toggleDropdown = function(dropdownId, arrow) {
				const dropdownMenu = document.getElementById('dropdown-' + dropdownId);
				
				if (!dropdownMenu) {
					return;
				}

				const isOpen = dropdownMenu.classList.contains('dropdown_open');

				// Close all dropdowns first
				closeAllDropdowns();

				// Toggle current dropdown if it wasn't open
				if (!isOpen) {
					updateDropdownPosition();
					dropdownMenu.classList.add('dropdown_open');
					if (arrow) {
						arrow.classList.add('dropdown_active');
					}
					// Add dropdown_open class to header
					if (headerSection) {
						headerSection.classList.add('dropdown_open');
					}
				}
			};

			// Handle dropdown arrow click
			dropdownArrows.forEach(arrow => {
				arrow.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					
					const dropdownId = this.getAttribute('data-dropdown');
					toggleDropdown(dropdownId, this);
				});
			});

			// Handle parent link click for dropdowns
			const dropdownLinks = document.querySelectorAll('.nav-link-with-dropdown, .nav-item-with-dropdown > a');
			dropdownLinks.forEach(link => {
				link.addEventListener('click', function(e) {
					// Check if this link has a dropdown
					const parentItem = this.closest('.nav-item-with-dropdown');
					if (parentItem) {
						const arrow = parentItem.querySelector('.dropdown_arrow');
						if (arrow) {
							e.preventDefault();
							e.stopPropagation();
							const dropdownId = arrow.getAttribute('data-dropdown');
							toggleDropdown(dropdownId, arrow);
						}
					}
				});
			});

			// Close dropdowns when clicking on dropdown items or buttons
			dropdownMenus.forEach(menu => {
				menu.addEventListener('click', function(e) {
					if (e.target.classList.contains('dropdown_item') || e.target.classList.contains('btn_primary')) {
						// Close dropdown after a short delay to allow navigation
						setTimeout(closeAllDropdowns, 100);
					}
				});
			});

			// Close dropdowns when clicking outside
			document.addEventListener('click', function(event) {
				const clickedInside = event.target.closest('.nav_item_with_dropdown');
				const clickedInDropdown = event.target.closest('.dropdown_menu_fullwidth');
				if (!clickedInside && !clickedInDropdown) {
					closeAllDropdowns();
				}
			});

			// Close dropdowns on escape key
			document.addEventListener('keydown', function(event) {
				if (event.key === 'Escape') {
					closeAllDropdowns();
				}
			});
		};

		// Initialize dropdowns
		initDropdowns();

		/**
		 * Initialize Mobile Menu Submenu Functionality
		 */
		const initMobileSubmenus = function() {
			const submenuToggles = document.querySelectorAll('.mobile_menu_submenu_toggle');
			
			submenuToggles.forEach(toggle => {
				toggle.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					
					const submenuId = this.getAttribute('data-submenu');
					const submenu = document.getElementById('mobile-submenu-' + submenuId);
					const parentItem = this.closest('.mobile_menu_item_has_submenu');
					
					if (!submenu || !parentItem) {
						return;
					}
					
					const isOpen = submenu.classList.contains('mobile_submenu_open');
					
					// Close all other submenus
					document.querySelectorAll('.mobile_menu_submenu').forEach(menu => {
						if (menu !== submenu) {
							menu.classList.remove('mobile_submenu_open');
						}
					});
					document.querySelectorAll('.mobile_menu_submenu_toggle').forEach(btn => {
						if (btn !== toggle) {
							btn.classList.remove('mobile_submenu_toggle_active');
						}
					});
					
					// Toggle current submenu
					if (isOpen) {
						submenu.classList.remove('mobile_submenu_open');
						toggle.classList.remove('mobile_submenu_toggle_active');
					} else {
						submenu.classList.add('mobile_submenu_open');
						toggle.classList.add('mobile_submenu_toggle_active');
					}
				});
			});
		};

		// Initialize mobile submenus
		initMobileSubmenus();

		/**
		 * Initialize Calendar Icon Click Handler
		 */
		const initCalendarIcon = function() {
			const calendarIcons = document.querySelectorAll('.header-form-calendar-icon');
			const dateInputs = document.querySelectorAll('.header-form-date-wrapper input[type="date"]');
			
			calendarIcons.forEach((icon, index) => {
				// Make icon clickable
				icon.style.pointerEvents = 'auto';
				icon.style.cursor = 'pointer';
				
				icon.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					
					// Find the corresponding date input
					const wrapper = icon.closest('.header-form-date-wrapper');
					if (wrapper) {
						const dateInput = wrapper.querySelector('input[type="date"]');
						if (dateInput) {
							// Focus and show the date picker
							dateInput.focus();
							// Use showPicker if available, otherwise just focus
							if (typeof dateInput.showPicker === 'function') {
								dateInput.showPicker();
							} else {
								// Fallback: trigger click on the input
								dateInput.click();
							}
						}
					}
				});
			});

			// Also ensure date inputs are clickable
			dateInputs.forEach(input => {
				input.addEventListener('click', function(e) {
					// Ensure the date picker opens (browser will handle it)
					// The native date input should open the picker on click
				});
			});
		};

		// Initialize calendar icon
		initCalendarIcon();
	};

	/**
	 * Initialize when DOM is ready
	 */
	const init = function() {
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', initHeader);
		} else {
			// DOM already loaded
			initHeader();
		}
	};

	// Start initialization
	init();

})();

