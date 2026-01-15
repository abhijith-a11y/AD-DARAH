<?php
/**
 * Testimonials Component Template
 *
 * @package addarah
 * 
 * Usage:
 * get_template_part('template-parts/Testimonials');
 */

// Sample testimonials data - replace with actual data source
$testimonials = array(
    array(
        'review' => 'This venue is perfect for large celebrations! The spaciousness is ideal for accommodating a significant number of guests, making it a fantastic choice for big events.',
        'name' => 'Sarah Mitchell',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.jpg',
        'rating' => 4,
    ),
    array(
        'review' => 'I attended the Ramadan Iftar at Al-Dara Hall and it was an amazing experience the steak was tender and delicious and the shawarma was perfect the Italian corner was fancy and the pizza was so good the desserts were varied and tasted great the Arabic dishes',
        'name' => 'Ryan Lee',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.jpg',
        'rating' => 4,
    ),
    array(
        'review' => 'The buffet offers an impressive variety of cuisines, from Arabic to Indian, ensuring there\'s something for everyone. The food quality is excellent, with fresh and flavorful dishes, particularly at the live stations.',
        'name' => 'Emma Algunaibet',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.jpg',
        'rating' => 4,
    ),
    array(
        'review' => 'This venue is perfect for large celebrations! The spaciousness is ideal for accommodating a significant number of guests, making it a fantastic choice for big events.',
        'name' => 'Sarah Mitchell',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.jpg',
        'rating' => 4,
    ),
    array(
        'review' => 'I attended the Ramadan Iftar at Al-Dara Hall and it was an amazing experience the steak was tender and delicious and the shawarma was perfect the Italian corner was fancy and the pizza was so good the desserts were varied and tasted great the Arabic dishes',
        'name' => 'Ryan Lee',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.jpg',
        'rating' => 4,
    ),
    array(
        'review' => 'The buffet offers an impressive variety of cuisines, from Arabic to Indian, ensuring there\'s something for everyone. The food quality is excellent, with fresh and flavorful dishes, particularly at the live stations.',
        'name' => 'Emma Algunaibet',
        'image' => get_template_directory_uri() . '/assets/images/testimonial-placeholder.jpg',
        'rating' => 4,
    ),
);
?>

<section class="testimonials-container pt_80 pb_80">
    <div class="testimonials-header">
        <h5 class="testimonials-tag">TESTIMONIALS</h5>
        <h2 class="testimonials-title">What Our Clients Say</h2>
    </div>

    <!-- Top Swiper (Right to Left) -->
    <div class="testimonials-swiper-wrapper testimonials-swiper-top">
        <!-- Left Overlay -->
        <div class="testimonials-overlay testimonials-overlay-left"></div>

        <!-- Swiper Container -->
        <div class="testimonials-swiper-container">
            <div class="swiper testimonials-swiper" data-testimonials-swiper-top>
                <div class="swiper-wrapper">
                    <?php
                    // Reverse array for right-to-left (top swiper)
                    $top_testimonials = array_reverse($testimonials);
                    foreach ($top_testimonials as $testimonial):
                        ?>
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <p class="testimonial-review"><?php echo esc_html($testimonial['review']); ?></p>
                                <div class="testimonial-author">
                                    <img src="<?php echo esc_url($testimonial['image']); ?>"
                                        alt="<?php echo esc_attr($testimonial['name']); ?>" class="testimonial-image">
                                    <div class="testimonial-info">
                                        <h4 class="testimonial-name"><?php echo esc_html($testimonial['name']); ?></h4>
                                        <div class="testimonial-rating">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $testimonial['rating']) {
                                                    echo '<span class="star star-filled">★</span>';
                                                } else {
                                                    echo '<span class="star star-outline">★</span>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Right Overlay -->
        <div class="testimonials-overlay testimonials-overlay-right"></div>
    </div>

    <!-- Bottom Swiper (Left to Right) -->
    <div class="testimonials-swiper-wrapper testimonials-swiper-bottom">
        <!-- Left Overlay -->
        <div class="testimonials-overlay testimonials-overlay-left"></div>

        <!-- Swiper Container -->
        <div class="testimonials-swiper-container">
            <div class="swiper testimonials-swiper" data-testimonials-swiper-bottom>
                <div class="swiper-wrapper">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <p class="testimonial-review"><?php echo esc_html($testimonial['review']); ?></p>
                                <div class="testimonial-author">
                                    <img src="<?php echo esc_url($testimonial['image']); ?>"
                                        alt="<?php echo esc_attr($testimonial['name']); ?>" class="testimonial-image">
                                    <div class="testimonial-info">
                                        <h4 class="testimonial-name"><?php echo esc_html($testimonial['name']); ?></h4>
                                        <div class="testimonial-rating">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $testimonial['rating']) {
                                                    echo '<span class="star star-filled">★</span>';
                                                } else {
                                                    echo '<span class="star star-outline">★</span>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Right Overlay -->
        <div class="testimonials-overlay testimonials-overlay-right"></div>
    </div>
</section>