<?php
/**
 * Services Stack Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/ServicesStack');
 */

// Service cards data
$services = array(
	array(
		'title' => 'Corporate Events',
		'description' => 'From global conferences to high-level government meetings, our venue offers the perfect setting for impactful events.',
		'image' => get_template_directory_uri() . '/assets/images/stack_img_01.png',
		'link' => home_url('/corporate-services'),
	),
	array(
		'title' => 'Weddings & Social Celebrations',
		'description' => 'A royal backdrop for your big day, blending tradition with elegance.',
		'image' => get_template_directory_uri() . '/assets/images/stack_img_02.png',
		'link' => home_url('/weddings-social-services'),
	),
	array(
		'title' => 'Catering',
		'description' => 'Exquisite on-site and off-site catering tailored to your event.',
		'image' => get_template_directory_uri() . '/assets/images/stack_img_03.png',
		'link' => home_url('/catering-services'),
	),
);
?>

<section class="services-stack-container" data-services-stack>
	<div class="services-stack-cards">
		<?php foreach ($services as $index => $service): ?>
			<div class="services-stack-card" data-services-card="<?php echo esc_attr($index); ?>">
				<a href="<?php echo esc_url($service['link']); ?>" class="services-stack-card-link"
					aria-label="View <?php echo esc_attr($service['title']); ?>">
					<div class="services-stack-card-bg"
						style="background-image: url('<?php echo esc_url($service['image']); ?>');"></div>
					<div class="services-stack-card-content">
						<span class="services-stack-card-tag">OUR SERVICES</span>
						<h2 class="services-stack-card-title"><?php echo esc_html($service['title']); ?></h2>
						<p class="services-stack-card-description"><?php echo esc_html($service['description']); ?></p>
					</div>
				</a>
				<a href="<?php echo esc_url($service['link']); ?>" class="services-stack-arrow-link"
					aria-label="View <?php echo esc_attr($service['title']); ?>">
					<svg width="37" height="22" viewBox="0 0 37 22" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M25.4268 21.4658L35.9915 10.901L25.4268 0.33625" stroke="white" stroke-width="0.950845"
							stroke-linejoin="round" />
						<path d="M0 11.0898L36.1321 11.0898" stroke="white" stroke-width="0.950845" />
					</svg>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
</section>