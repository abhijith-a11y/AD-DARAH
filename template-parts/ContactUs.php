<?php
/**
 * Contact Us Component Template
 *
 * @package addarah
 */

// Get contact us settings from theme mods or defaults
$contact_title = get_theme_mod( 'contact_title', 'Your Event, Our Venue — Excellence Awaits' );
$contact_description = get_theme_mod( 'contact_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' );
$contact_button_text = get_theme_mod( 'contact_button_text', 'Contact Us' );
$contact_button_link = get_theme_mod( 'contact_button_link', '#' );
$contact_bg_image = get_theme_mod( 'contact_bg_image', get_template_directory_uri() . '/assets/images/contact-bg.jpg' );
?>

<section class="contact-us-container pb_120 pt_120" style="background-image: url('<?php echo esc_url( $contact_bg_image ); ?>');">
	<div class="container">
		<div class="contact-us-content" data-aos="fade-up">
			<?php if ( $contact_title ) : ?>
				<h2 class="contact-us-title"><?php echo esc_html( $contact_title ); ?></h2>
			<?php endif; ?>
			
			<?php if ( $contact_description ) : ?>
				<p class="contact-us-description"><?php echo esc_html( $contact_description ); ?></p>
			<?php endif; ?>
			
			<?php if ( $contact_button_text ) : ?>
				<a href="<?php echo esc_url( $contact_button_link ); ?>" class="primary-button">
					<?php echo esc_html( $contact_button_text ); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>

