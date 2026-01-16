<?php
/**
 * Corporate Services Section Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $corporate_services_heading = 'Corporate Services';
 * $corporate_services_paragraph = 'Our culinary team delivers memorable dining experiences...';
 * $corporate_services_items = array(
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/corp_ser_01.png',
 *         'heading' => 'Conferences & Exhibitions',
 *         'paragraph' => 'Grand halls with advanced AV and staging for large-scale events.',
 *         'button_text' => 'Explore More',
 *         'button_link' => '#'
 *     ),
 * );
 * include locate_template('template-parts/CorporateServicesSection.php');
 */

// Get variables with defaults
$corporate_services_heading = isset($corporate_services_heading) ? $corporate_services_heading : '';
$corporate_services_paragraph = isset($corporate_services_paragraph) ? $corporate_services_paragraph : '';
$corporate_services_items = isset($corporate_services_items) && is_array($corporate_services_items) ? $corporate_services_items : array();
?>

<section class="corporate-services-section pb_100 pt_100">
	<div class="container">
		<?php if ($corporate_services_heading): ?>
			<h2 class="corporate-services-section-heading"><?php echo esc_html($corporate_services_heading); ?></h2>
		<?php endif; ?>
		
		<?php if ($corporate_services_paragraph): ?>
			<p class="corporate-services-section-paragraph"><?php echo esc_html($corporate_services_paragraph); ?></p>
		<?php endif; ?>

		<?php if (!empty($corporate_services_items)): ?>
			<div class="corporate-services-swiper-container">
				<div class="swiper corporate-services-swiper" data-corporate-services-swiper>
					<div class="swiper-wrapper">
						<?php foreach ($corporate_services_items as $item): ?>
							<div class="swiper-slide">
								<div class="corporate-services-card">
									<?php if (!empty($item['image'])): ?>
										<div class="corporate-services-card-image">
											<img src="<?php echo esc_url($item['image']); ?>" 
												alt="<?php echo esc_attr($item['heading'] ?? 'Service image'); ?>">
										</div>
									<?php endif; ?>
									
									<?php if (!empty($item['heading'])): ?>
										<h3 class="corporate-services-card-heading"><?php echo esc_html($item['heading']); ?></h3>
									<?php endif; ?>
									
									<div class="corporate-services-card-overlay">
										<?php if (!empty($item['paragraph'])): ?>
											<p class="corporate-services-card-paragraph"><?php echo esc_html($item['paragraph']); ?></p>
										<?php endif; ?>
										
										<?php if (!empty($item['button_text']) && !empty($item['button_link'])): ?>
											<a href="<?php echo esc_url($item['button_link']); ?>" class="primary-button corporate-services-card-button">
												<?php echo esc_html($item['button_text']); ?>
											</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

