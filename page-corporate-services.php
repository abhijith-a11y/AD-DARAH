<?php
/**
 * The Corporate Services template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="home-page">
        <?php
        // Banner Section
        set_query_var('banner_title', 'Corporate Services');
        set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/Corporate_Services_banner.png');
        get_template_part('template-parts/Banner');
        ?>

        <?php
        // Image Text Section
        $image_text_image = get_template_directory_uri() . '/assets/images/cop_service_01.png';
        $image_text_headline_1 = 'Comprehensive Event Services Under One Roof';
        $image_text_paragraphs = array(
            "AD-DARAH offers tailored solutions for every occasion — from corporate summits and government events to weddings, social gatherings, and world-class catering.",
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor."
        );
        $image_text_button_text = 'Explore Corporate Services';
        $image_text_button_link = '#';

        include locate_template('template-parts/ImageTextSection.php');
        ?>

        <?php
        // Corporate Services Section
        $corporate_services_heading = 'Corporate Services';
        $corporate_services_paragraph = 'Our culinary team delivers memorable dining experiences with menus tailored to your event.';
        $corporate_services_items = array(
            array(
                'image' => get_template_directory_uri() . '/assets/images/corp_ser_01.png',
                'heading' => 'Conferences & Exhibitions',
                'paragraph' => 'Grand halls with advanced AV and staging for large-scale events.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/corp_ser_02.png',
                'heading' => 'Meeting Rooms & Workshops',
                'paragraph' => 'Professional spaces designed for productive meetings and collaborative workshops.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/corp_ser_03.png',
                'heading' => 'Government Events (B2G)',
                'paragraph' => 'Elegant venues for official government functions and formal ceremonies.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
            array(
                'image' => get_template_directory_uri() . '/assets/images/corp_ser_04.png',
                'heading' => 'Corporate Events',
                'paragraph' => 'Sophisticated settings for corporate gatherings and business events.',
                'button_text' => 'Explore More',
                'button_link' => '#'
            ),
        );

        include locate_template('template-parts/CorporateServicesSection.php');
        ?>

    </div>
</main><!-- #main -->

<?php
get_footer();
?>

<!-- Direct script load for Corporate Services Slider (fallback) -->
<?php if (!wp_style_is('swiper-css', 'done') && !wp_style_is('swiper-css', 'enqueued')): ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<?php endif; ?>
<?php if (!wp_script_is('swiper-js', 'done') && !wp_script_is('swiper-js', 'enqueued')): ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<?php endif; ?>
<script>
    // Also load CorporateServicesSlider.js directly
    (function () {
        console.log("Loading CorporateServicesSlider.js directly from template...");
        var script = document.createElement('script');
        script.src = '<?php echo get_template_directory_uri(); ?>/assets/js/CorporateServicesSlider.js?v=<?php echo _S_VERSION; ?>';
        script.onload = function () {
            console.log("CorporateServicesSlider.js loaded successfully!");
        };
        script.onerror = function () {
            console.error("Failed to load CorporateServicesSlider.js from:", script.src);
        };
        document.head.appendChild(script);
    })();
</script>