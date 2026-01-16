<?php
/**
 * Template Name: Contact Us
 * The contact us template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page">
		<?php
		// Banner Section
		set_query_var('banner_title', 'Contact Us');
		set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/contact-baner-img.jpg');
		get_template_part('template-parts/Banner');
		?>

		<section class="contact-page-content pt_120 pb_120">
			<?php
			// Contact Form Section
			get_template_part('template-parts/ContactForm');
			?>
		</section>

		<section class="contact-info-map-page-section">
			<?php
			// Contact Info and Map Section
			get_template_part('template-parts/ContactInfoMap');
			?>
		</section>
	</div>
</main><!-- #main -->

<?php
get_footer();

