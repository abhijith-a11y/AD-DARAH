<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package addarah
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	
	<header id="headerMainSection" class="main-header">
		<div class="container header-container header-initial-container" id="headerInitialContainer">
			<!-- Logo -->
			<div class="header-logo">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/main-logo.svg'); ?>" alt="<?php bloginfo('name'); ?>">
				</a>
			</div>

			<!-- Navigation -->
			<nav class="header-nav">
				<?php
				if (has_nav_menu('menu-1')) {
					wp_nav_menu(array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'menu_class'     => 'nav-menu',
						'fallback_cb'    => false,
					));
				} else {
					// Custom Navigation if menu not set
					echo '<ul class="nav-menu">';
					echo '<li class="nav-item"><a href="' . esc_url(home_url('/about')) . '">About Us</a></li>';
					echo '<li class="nav-item nav-item-with-dropdown">';
					echo '<a href="#" class="nav-link-with-dropdown">';
					echo 'Services';
					echo '<span class="dropdown_arrow" data-dropdown="services">';
					echo '<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">';
					echo '<path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>';
					echo '</svg>';
					echo '</span>';
					echo '</a>';
					echo '</li>';
					echo '<li class="nav-item"><a href="' . esc_url(home_url('/media-center')) . '">Media Center</a></li>';
					echo '<li class="nav-item"><a href="' . esc_url(home_url('/contact')) . '">Contact Us</a></li>';
					echo '</ul>';
				}
				?>
			</nav>

			<!-- Utility Icons -->
			<div class="header-utilities">
				<a href="#" class="header-icon search-icon" aria-label="Search">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/search.svg.svg'); ?>" alt="Search">
				</a>
				<a href="#" class="header-icon lang-icon" aria-label="Language">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/lang.svg.svg'); ?>" alt="Language">
				</a>
			<button class="mobile-menu-toggle" id="menuIcon" aria-label="Menu">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/hamburger.svg'); ?>" alt="Menu">
			</button>
			</div>
		</div>

		<!-- Services Dropdown -->
		<div id="dropdown-services" class="dropdown_menu_fullwidth">
			<div class="dropdown-container container">
				<div class="dropdown-content">
					<h3 class="dropdown-title">Our Services</h3>
					<div class="dropdown-columns">
						<div class="dropdown-column">
							<h4 class="dropdown-column-title">Corporate Services</h4>
							<ul class="dropdown-list">
								<li><a href="#" class="dropdown_item">Conferences & Exhibitions</a></li>
								<li><a href="#" class="dropdown_item">Meeting Rooms & Workshops</a></li>
								<li><a href="#" class="dropdown_item">Government Events (B2G)</a></li>
								<li><a href="#" class="dropdown_item">VIP Majlis</a></li>
							</ul>
						</div>
						<div class="dropdown-column">
							<h4 class="dropdown-column-title">Weddings & Social Services</h4>
							<ul class="dropdown-list">
								<li><a href="#" class="dropdown_item">Female Packages</a></li>
								<li><a href="#" class="dropdown_item">Male Packages</a></li>
							</ul>
						</div>
						<div class="dropdown-column">
							<h4 class="dropdown-column-title">Catering Services</h4>
							<ul class="dropdown-list">
								<li><a href="#" class="dropdown_item">On-site Catering</a></li>
								<li><a href="#" class="dropdown_item">Off-site Catering</a></li>
								<li><a href="#" class="dropdown_item">Seasonal & Ramadan Packages</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Mobile Menu Overlay -->
		<div id="mobileMenuOverlay" class="mobile-menu-overlay">
			<div class="mobile-menu-content">
				<ul class="mobile-menu">
					<li class="mobile_menu_item">
						<a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a>
					</li>
					<li class="mobile_menu_item mobile_menu_item_has_submenu">
						<a href="#" class="mobile_menu_submenu_toggle" data-submenu="services">
							Services
							<span class="mobile-submenu-arrow">
								<svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</span>
						</a>
						<ul id="mobile-submenu-services" class="mobile_menu_submenu">
							<li><a href="#">Conferences & Exhibitions</a></li>
							<li><a href="#">Meeting Rooms & Workshops</a></li>
							<li><a href="#">Government Events (B2G)</a></li>
							<li><a href="#">VIP Majlis</a></li>
							<li><a href="#">Female Packages</a></li>
							<li><a href="#">Male Packages</a></li>
							<li><a href="#">On-site Catering</a></li>
							<li><a href="#">Off-site Catering</a></li>
							<li><a href="#">Seasonal & Ramadan Packages</a></li>
						</ul>
					</li>
					<li class="mobile_menu_item">
						<a href="<?php echo esc_url(home_url('/media-center')); ?>">Media Center</a>
					</li>
					<li class="mobile_menu_item">
						<a href="<?php echo esc_url(home_url('/contact')); ?>">Contact Us</a>
					</li>
				</ul>
			</div>
		</div>

		<!-- Scroll Header (appears after 700px scroll) -->
		<div class="container header-container header-scroll-container" id="headerScrollContainer">
			<!-- Logo -->
			<div class="header-logo">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/main-logo.svg'); ?>" alt="<?php bloginfo('name'); ?>">
				</a>
			</div>

			<!-- Booking Form -->
			<form class="header-booking-form" action="#" method="post">
				<input type="text" name="full_name" placeholder="Full Name" class="header-form-input header-form-input-small" required>
				<input type="email" name="email" placeholder="Email Address" class="header-form-input header-form-input-small" required>
				<input type="tel" name="phone" placeholder="Phone No." class="header-form-input header-form-input-small" required>
				<select name="event_type" class="header-form-input header-form-input-large" required>
					<option value="">Event Type</option>
					<option value="wedding">Wedding</option>
					<option value="corporate">Corporate</option>
					<option value="social">Social</option>
				</select>
				<div class="header-form-date-wrapper">
					<input type="date" name="event_date" placeholder="Preferred Time" class="header-form-input" required>
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/header_calendar.svg'); ?>" alt="Calendar" class="header-form-calendar-icon">
				</div>
				<button type="submit" class="primary-button header-form-button">Book a Visit</button>
			</form>

			<!-- Utility Icons -->
			<div class="header-utilities">
				<a href="#" class="header-icon search-icon" aria-label="Search">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/search.svg.svg'); ?>" alt="Search">
				</a>
				<a href="#" class="header-icon lang-icon" aria-label="Language">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/lang.svg.svg'); ?>" alt="Language">
				</a>
				<button class="mobile-menu-toggle" id="menuIconScroll" aria-label="Menu">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/hamburger.svg'); ?>" alt="Menu">
				</button>
			</div>
		</div>
	</header>

	<div id="content" class="site-content">