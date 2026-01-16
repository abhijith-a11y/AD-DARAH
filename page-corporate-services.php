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

    </div>
</main><!-- #main -->

<?php
get_footer();

