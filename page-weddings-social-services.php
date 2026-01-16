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


        // Page content can be added here
        // You can add more sections similar to page-about.php
        // For example: ImageTextSection, testimonials, etc.
        ?>
    </div>
</main><!-- #main -->

<?php
get_footer();

