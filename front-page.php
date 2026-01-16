<?php
/**
 * The front page template file
 *
 * This is the template for the home page
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page">
		<?php
		// Main Banner Section
		get_template_part('template-parts/MainBanner');

		// Where Ever Content Section
		get_template_part('template-parts/WhereEver');

		// Statistics Section
		get_template_part('template-parts/Statistics');

		// Partners/Logos Marquee Section
		get_template_part('template-parts/Partners');

		// Services Stack Section
		get_template_part('template-parts/ServicesStack');

		// Testimonials Section
		get_template_part('template-parts/Testimonials');

		// News & Articles Section
		get_template_part('template-parts/NewsArticles');

		// Virtual Tour Section
		get_template_part('template-parts/VirtualTour');

		// Contact Us Section
		get_template_part('template-parts/ContactUs');
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();

