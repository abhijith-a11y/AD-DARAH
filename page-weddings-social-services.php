<?php
/**
 * The Weddings & Social Services template file
 *
 * @package addarah
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="home-page">
        <?php
        // Banner Section
        set_query_var('banner_title', 'Weddings & Social Services');
        set_query_var('banner_bg_image', get_template_directory_uri() . '/assets/images/wedding_banner.png');
        get_template_part('template-parts/Banner');
        ?>

        <?php
        $image_text_image = get_template_directory_uri() . '/assets/images/wedding_img_01.png';
        $image_text_headline_1 = 'Celebrate Life\'s Most Precious Moments at AD-DARAH';
        // $image_text_headline_2 = 'AD-DARAH';
        $image_text_paragraphs = array(
            "AD-DARAH is Riyadh's premier destination for iconic events, built on a strong Saudi heritage while embracing modern innovation. From corporate summits to royal weddings, our venue represents elegance, excellence, and cultural pride. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor."
        );
        $image_text_button_text = 'Explore Weddings & Social Services';
        $image_text_button_link = '#';

        include locate_template('template-parts/ImageTextSection.php'); ?>
        ?>


        <?php
        // Perfect Day Section
        $perfect_day_bg_image = get_template_directory_uri() . '/assets/images/perfect_day_bg.png';
        $perfect_day_heading = 'Everything for Your Perfect Day';
        $perfect_day_paragraph = 'From intimate engagements to royal weddings, AD-DARAH creates timeless celebrations that honor heritage and style. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut tempus libero. Donec ornare mauris ac dictum sodales. Aenean eu consequat tortor.';
        $perfect_day_slider_items = array(
            array(
                'heading' => 'Weddings & Engagements',
                'paragraph' => 'Celebrate in a setting that reflects elegance and Saudi tradition.'
            ),
            array(
                'heading' => 'Facilities',
                'paragraph' => 'Fully segregated male & female halls with premium amenities.'
            ),
            array(
                'heading' => 'Wedding Packages',
                'paragraph' => 'Pearl - Elegant and intimate setting | Diamond - Luxury with added services | Royal - The ultimate wedding experience'
            ),
            array(
                'heading' => 'Bridal Services',
                'paragraph' => 'Luxury consultation and more'
            ),
        );

        include locate_template('template-parts/PerfectDaySection.php');
        ?>

    </div>
</main><!-- #main -->

<?php
get_footer();

