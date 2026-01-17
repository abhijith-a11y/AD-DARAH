<?php
/**
 * Dual Slider Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $dual_slider_items = array(
 *     array(
 *         'heading' => 'Our Values',
 *         'subheading' => 'Heritage & Identity',
 *         'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
 *         'image' => get_template_directory_uri() . '/assets/images/dual_01.png',
 *     ),
 *     array(
 *         'heading' => 'Our Values',
 *         'subheading' => 'Excellence in Service',
 *         'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
 *         'image' => get_template_directory_uri() . '/assets/images/dual_02.png',
 *     ),
 * );
 * set_query_var('dual_slider_items', $dual_slider_items);
 * get_template_part('template-parts/DualSlider');
 */

// Get slider items from query var with default
$dual_slider_items = get_query_var('dual_slider_items', array());
?>

<section class="dual-slider-container" data-dual-slider>
	<div class="container">
		<div class="dual-slider-wrapper">
			<!-- Text Slider (Left) -->
			<div class="dual-slider-text-wrapper">
				<div class="swiper dual-slider-text-swiper" data-dual-text-swiper>
					<div class="swiper-wrapper">
						<?php foreach ($dual_slider_items as $item): ?>
							<div class="swiper-slide">
								<div class="dual-slider-text-content">
									<?php if (!empty($item['heading'])): ?>
										<h2 class="dual-slider-heading"><?php echo esc_html($item['heading']); ?></h2>
									<?php endif; ?>
									<?php if (!empty($item['subheading'])): ?>
										<h3 class="dual-slider-subheading"><?php echo esc_html($item['subheading']); ?></h3>
									<?php endif; ?>
									<?php if (!empty($item['description'])): ?>
										<p class="dual-slider-description"><?php echo esc_html($item['description']); ?></p>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

			<!-- Image Slider (Right) -->
			<div class="dual-slider-image-wrapper">
				<div class="swiper dual-slider-image-swiper" data-dual-image-swiper>
					<div class="swiper-wrapper">
						<?php foreach ($dual_slider_items as $item): ?>
							<div class="swiper-slide">
								<?php if (!empty($item['image'])): ?>
									<div class="dual-slider-image">
										<img src="<?php echo esc_url($item['image']); ?>" 
											alt="<?php echo esc_attr($item['subheading'] ?? 'Slider image'); ?>">
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Navigation Controls -->
		<div class="dual-slider-navigation">
			<button class="dual-slider-prev" aria-label="Previous slide">
				<svg width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.03516 15.623L0.346245 7.93414L8.03516 0.245224" stroke="#282828" stroke-width="0.692012" stroke-linejoin="round"/>
					<path d="M26.541 8.07227L0.244546 8.07227" stroke="#282828" stroke-width="0.692012"/>
				</svg>
			</button>
			<button class="dual-slider-next" aria-label="Next slide">
				<svg width="27" height="16" viewBox="0 0 27 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M8.03516 15.623L0.346245 7.93414L8.03516 0.245224" stroke="#282828" stroke-width="0.692012" stroke-linejoin="round"/>
					<path d="M26.541 8.07227L0.244546 8.07227" stroke="#282828" stroke-width="0.692012"/>
				</svg>
			</button>
		</div>
	</div>
</section>

