<?php
/**
 * Packages Section Component Template
 *
 * @package addarah
 * 
 * Usage:
 * $packages_heading = 'Weddings & Social Services';
 * $packages_paragraph = 'From intimate engagements to royal weddings...';
 * $packages_items = array(
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/wedding_01.png',
 *         'heading' => 'Female Packages',
 *         'paragraph' => 'Experience an atmosphere of elegance...',
 *         'button_text' => 'Explore More',
 *         'button_link' => '#'
 *     ),
 *     array(
 *         'image' => get_template_directory_uri() . '/assets/images/wedding_02.png',
 *         'heading' => 'Male Packages',
 *         'paragraph' => 'Host your celebration in a grand setting...',
 *         'button_text' => 'Explore More',
 *         'button_link' => '#'
 *     ),
 * );
 * include locate_template('template-parts/PackagesSection.php');
 */

// Get variables with defaults
$packages_heading = isset($packages_heading) ? $packages_heading : '';
$packages_paragraph = isset($packages_paragraph) ? $packages_paragraph : '';
$packages_items = isset($packages_items) && is_array($packages_items) ? $packages_items : array();
?>

<section class="packages-section pb_100 pt_100">
	<div class="container">
		<?php if ($packages_heading): ?>
			<h2 class="packages-section-heading"><?php echo esc_html($packages_heading); ?></h2>
		<?php endif; ?>
		
		<?php if ($packages_paragraph): ?>
			<p class="packages-section-paragraph"><?php echo esc_html($packages_paragraph); ?></p>
		<?php endif; ?>

		<?php if (!empty($packages_items)): ?>
			<div class="packages-cards-wrapper">
				<?php foreach ($packages_items as $item): ?>
					<div class="packages-card">
						<?php if (!empty($item['image'])): ?>
							<div class="packages-card-image">
								<img src="<?php echo esc_url($item['image']); ?>" 
									alt="<?php echo esc_attr($item['heading'] ?? 'Package image'); ?>">
							</div>
						<?php endif; ?>
						
						<div class="packages-card-overlay">
							<?php if (!empty($item['heading'])): ?>
								<h3 class="packages-card-heading"><?php echo esc_html($item['heading']); ?></h3>
							<?php endif; ?>
							
							<?php if (!empty($item['paragraph'])): ?>
								<p class="packages-card-paragraph"><?php echo esc_html($item['paragraph']); ?></p>
							<?php endif; ?>
							
							<?php if (!empty($item['button_text']) && !empty($item['button_link'])): ?>
								<a href="<?php echo esc_url($item['button_link']); ?>" class="primary-button packages-card-button">
									<?php echo esc_html($item['button_text']); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

