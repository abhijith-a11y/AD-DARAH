<?php
/**
 * Template Name: Press Release Detail
 * The press release detail template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="home-page">
		<?php
		// Banner Section
		set_query_var('banner_title', get_the_title());
		$banner_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
		if (!$banner_image) {
			$banner_image = get_template_directory_uri() . '/assets/images/contact-bg.jpg';
		}
		set_query_var('banner_bg_image', $banner_image);
		get_template_part('template-parts/Banner');
		?>

		<section class="press-release-detail-content pt_120 pb_120">
			<div class="wrap">
				<?php
				// Press Release Detail Section
				get_template_part('template-parts/PressReleaseDetail');
				?>
			</div>
		</section>

		<section class="related-press-releases-section pt_120 pb_120">
			<div class="wrap">
				<?php
				// Related Press Releases Section
				get_template_part('template-parts/RelatedPressReleases');
				?>
			</div>
		</section>
	</div>
</main><!-- #main -->

<?php
get_footer();

