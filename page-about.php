<?php
/**
 * The about template file
 *
 * 
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page">
		<?php
		// Banner Section
		set_query_var('banner_title', 'About Us');
		set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/about-banner.png');
		get_template_part('template-parts/Banner');
		?>

		<?php
		$image_text_image = get_template_directory_uri() . '/assets/images/about_pic.jpg';
		$image_text_headline_1 = 'Discover the Story Behind';
		$image_text_headline_2 = 'AD-DARAH';
		$image_text_paragraphs = array(
			'AD-DARAH is Riyadh\'s premier destination for iconic events, built on a strong Saudi heritage while embracing modern innovation. From corporate summits to royal weddings, our venue represents elegance, excellence, and cultural pride.',
			'AD-DARAH is a world-class events venue located in the heart of Riyadh, designed to host corporate, cultural, and social gatherings of all scales. Combining architectural excellence with modern amenities, we provide an unmatched setting for experiences that leave a lasting impression.'
		);
		
		include locate_template('template-parts/ImageTextSection.php'); ?>
		<?php
		// Venue At A Glance Section
		$venue_title = 'VENUE AT A GLANCE';
		$venue_slides = array(
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_1.jpg',
				'capacity_label' => 'Total Capacity',
				'capacity_value' => 'Up to 2,500 Guests',
				'button_text' => 'Download Venue Floor Plan',
				'button_url' => '#'
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_2.jpg',
				'capacity_label' => 'Capacity',
				'capacity_value' => '1,500 Guests',
				'button_text' => 'View Details',
				'button_url' => '#'
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_3.jpg',
				'capacity_label' => 'Capacity',
				'capacity_value' => '500 Guests',
				'button_text' => 'Learn More',
				'button_url' => '#'
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_4.jpg',
				'capacity_label' => 'Capacity',
				'capacity_value' => '800 Guests',
				'button_text' => 'Explore',
				'button_url' => '#'
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_5.jpg',
				'capacity_label' => 'Capacity',
				'capacity_value' => '2,000 Guests',
				'button_text' => 'View Floor Plan',
				'button_url' => '#'
			),
			array(
				'image' => get_template_directory_uri() . '/assets/images/venue_6.jpg',
				'capacity_label' => 'Welcome Area',
				'capacity_value' => 'Spacious Lobby',
				'button_text' => 'Take Tour',
				'button_url' => '#'
			)
		);
		include locate_template('template-parts/VenueAtAGlance.php'); ?>
		<?php
		// Contact Us Section
		get_template_part('template-parts/ContactUs');
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();